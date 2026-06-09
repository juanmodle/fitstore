<?php

namespace App\Models;

use App\Events\OrderPaid;
use App\Events\ProductLowStock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['order_number', 'user_id', 'status', 'total_price', 'shipping_price', 'discount_amount', 'payment_status', 'shipping_address_id', 'billing_address_id', 'notes'];


    protected function casts(): array
    {
        return [
        'total_price' => 'decimal:2',
        'shipping_price' => 'decimal:2',
        'discount_amount' => 'decimal:2',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function shippingAddress()
    {
        return $this->belongsTo(Address::class, 'shipping_address_id');
    }

    public function billingAddress()
    {
        return $this->belongsTo(Address::class, 'billing_address_id');
    }

    public function scopePaidBetween($query, $from = null, $to = null)
    {
        return $query->where('payment_status', 'paid')
            ->when($from, fn ($q) => $q->whereDate('created_at', '>=', $from))
            ->when($to, fn ($q) => $q->whereDate('created_at', '<=', $to))
            ->orderByDesc('created_at');
    }

    public function scopeForCustomer($query, User $user)
    {
        return $query->with('items', 'payment', 'shippingAddress')
            ->where('user_id', $user->id)
            ->latest();
    }

    public static function createFromCart(User $user, array $data): self
    {
        $order = DB::transaction(function () use ($user, $data) {
            $cart = Cart::activeForUser($user)->load(['items.product', 'items.variant']);

            if ($cart->items->isEmpty()) {
                throw ValidationException::withMessages(['cart' => 'Your cart is empty.']);
            }

            foreach ($cart->items as $item) {
                $stock = $item->variant ? $item->variant->stock : $item->product->stock;

                if ($item->product->status !== 'active' || $stock < $item->quantity) {
                    throw ValidationException::withMessages(['stock' => 'Some products are no longer available.']);
                }
            }

            $subtotal = $cart->subtotal();
            $coupon = Coupon::findValidForUser($data['coupon_code'] ?? null, $user);
            $discountAmount = $coupon ? $coupon->discountForSubtotal($subtotal) : 0;
            $shippingPrice = $subtotal >= 60 ? 0 : 4.95;
            $finalAmount = max(0, $subtotal + $shippingPrice - $discountAmount);

            $order = self::create([
                'order_number' => 'FS-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6)),
                'user_id' => $user->id,
                'status' => 'processing',
                'total_price' => $finalAmount,
                'shipping_price' => $shippingPrice,
                'discount_amount' => $discountAmount,
                'payment_status' => 'paid',
                'shipping_address_id' => $data['shipping_address_id'],
                'billing_address_id' => $data['billing_address_id'],
                'notes' => $data['notes'] ?? null,
            ]);

            foreach ($cart->items as $item) {
                $order->items()->create([
                    'product_id' => $item->product_id,
                    'product_variant_id' => $item->product_variant_id,
                    'product_name' => $item->product->name,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->unit_price,
                    'total_price' => $item->unit_price * $item->quantity,
                ]);

                if ($item->variant) {
                    $item->variant->decrement('stock', $item->quantity);
                } else {
                    $item->product->decrement('stock', $item->quantity);

                    if ($item->product->fresh()->stock <= 5) {
                        event(new ProductLowStock($item->product->fresh()));
                    }
                }
            }

            $paymentData = ['status' => 'paid', 'transaction_id' => 'MOCK-' . strtoupper(Str::random(10)), 'notes' => 'Realistic payment mock for the academic project.'];

            Payment::create([
                'user_id' => $user->id,
                'order_id' => $order->id,
                'payment_method_id' => $data['payment_method_id'],
                'amount' => $finalAmount,
                'status' => $paymentData['status'],
                'transaction_id' => $paymentData['transaction_id'],
                'payment_date' => now(),
                'notes' => $paymentData['notes'],
            ]);

            Document::create([
                'user_id' => $user->id,
                'title' => 'Invoice ' . $order->order_number,
                'description' => 'Generated invoice document.',
                'document_type' => 'invoice',
                'file_path' => 'invoices/' . $order->order_number . '.pdf',
                'related_model' => self::class,
                'related_id' => $order->id,
            ]);

            EmailLog::create([
                'user_id' => $user->id,
                'email_to' => $user->email,
                'subject' => 'Order confirmation ' . $order->order_number,
                'status' => 'logged',
                'sent_at' => now(),
            ]);

            AuditLog::create([
                'user_id' => $user->id,
                'action' => 'created_order',
                'table_name' => 'orders',
                'record_id' => $order->id,
                'new_values' => $order->toArray(),
            ]);

            if ($coupon) {
                $coupon->markUsedByWithEvent($user);
            }

            $cart->items()->delete();
            $cart->update(['status' => 'converted']);

            event(new OrderPaid($order));

            return $order->load('items', 'payment');
        });

        Artisan::call('fitstore:low-stock-report');
        Artisan::call('fitstore:expire-coupons');

        return $order;
    }
}
