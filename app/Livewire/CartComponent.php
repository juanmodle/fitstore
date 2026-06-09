<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\CartItem;
use Livewire\Component;

class CartComponent extends Component
{
    public function remove(int $cartItemId): void
    {
        $item = CartItem::findOrFail($cartItemId);
        abort_unless($item->cart->user_id === auth()->id(), 403);
        $item->delete();
    }

    public function increase(int $cartItemId): void
    {
        CartItem::findOrFail($cartItemId)->increment('quantity');
    }

    public function decrease(int $cartItemId): void
    {
        $item = CartItem::findOrFail($cartItemId);
        $item->quantity > 1 ? $item->decrement('quantity') : $item->delete();
    }

    public function render()
    {
        $cart = Cart::with('items.product')->where('user_id', auth()->id())->where('status', 'open')->first();

        return view('livewire.cart-component', ['cart' => $cart]);
    }
}
