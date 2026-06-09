<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'status'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    public static function activeForUser(User $user): self
    {
        $cart = self::where('user_id', $user->id)
            ->whereIn('status', ['active', 'open'])
            ->latest()
            ->first();

        if ($cart) {
            return $cart;
        }

        return self::create(['user_id' => $user->id, 'status' => 'active']);
    }

    public static function addItemForUser(User $user, Product $product, ?int $variantId, int $quantity): CartItem
    {
        if ($quantity < 1) {
            throw ValidationException::withMessages(['quantity' => 'Quantity must be at least 1.']);
        }

        if ($product->status !== 'active') {
            throw ValidationException::withMessages(['product' => 'This product cannot be bought right now.']);
        }

        $variant = $variantId ? ProductVariant::where('product_id', $product->id)->findOrFail($variantId) : null;
        $availableStock = $variant ? $variant->stock : $product->stock;

        if ($availableStock < $quantity) {
            throw ValidationException::withMessages(['quantity' => 'There is not enough stock for this product.']);
        }

        $cart = self::activeForUser($user);
        $unitPrice = $product->currentPrice() + (float) optional($variant)->extra_price;

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->where('product_variant_id', $variant?->id)
            ->first();

        if ($item) {
            $newQuantity = $item->quantity + $quantity;

            if ($availableStock < $newQuantity) {
                throw ValidationException::withMessages(['quantity' => 'The cart quantity is higher than the available stock.']);
            }

            $item->update(['quantity' => $newQuantity]);

            return $item;
        }

        return CartItem::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'product_variant_id' => $variant?->id,
            'quantity' => $quantity,
            'unit_price' => $unitPrice,
        ]);
    }

    public function subtotal(): float
    {
        return (float) $this->items->sum(fn ($item) => $item->quantity * $item->unit_price);
    }
}
