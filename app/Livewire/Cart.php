<?php

namespace App\Livewire;

use App\Models\Cart as CartModel;
use App\Models\CartItem;
use App\Models\Coupon;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Cart extends Component
{
    public string $couponCode = '';
    public ?string $notice = null;

    public function updateQuantity(int $itemId, int $quantity): void
    {
        if ($quantity < 1) {
            $quantity = 1;
        }

        $item = CartItem::with('cart', 'product', 'variant')->findOrFail($itemId);
        abort_unless($item->cart->user_id === auth()->id(), 403);

        $stock = $item->variant ? $item->variant->stock : $item->product->stock;

        if ($quantity > $stock) {
            $this->notice = 'There is not enough stock.';
            return;
        }

        $item->update(['quantity' => $quantity]);
        $this->notice = 'Cart updated.';
    }

    public function removeItem(int $itemId): void
    {
        $item = CartItem::with('cart')->findOrFail($itemId);
        abort_unless($item->cart->user_id === auth()->id(), 403);
        $item->delete();
        $this->notice = 'Item removed.';
    }

    public function applyCoupon(): void
    {
        try {
            CartModel::activeForUser(auth()->user())->load('items');
            $coupon = Coupon::findValidForUser($this->couponCode, auth()->user());
            session(['coupon_code' => $coupon?->code]);
            $this->notice = 'Coupon applied.';
        } catch (ValidationException $exception) {
            $this->notice = $exception->validator->errors()->first('coupon');
        }
    }

    public function render()
    {
        $cart = CartModel::activeForUser(auth()->user())->load('items.product.mainImage', 'items.variant');
        $subtotal = $cart->subtotal();
        $coupon = null;

        try {
            $coupon = Coupon::findValidForUser(session('coupon_code'), auth()->user());
        } catch (ValidationException) {
            session()->forget('coupon_code');
        }

        $discount = $coupon ? $coupon->discountForSubtotal($subtotal) : 0;
        $shipping = $subtotal >= 60 || $subtotal == 0 ? 0 : 4.95;

        return view('livewire.cart', [
            'cart' => $cart,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'shipping' => $shipping,
            'total' => max(0, $subtotal + $shipping - $discount),
        ]);
    }
}
