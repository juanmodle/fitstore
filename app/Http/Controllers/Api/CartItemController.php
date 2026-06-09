<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartItemRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    public function store(CartItemRequest $request)
    {
        $data = $request->validated();

        $item = Cart::addItemForUser($request->user(), Product::findOrFail($data['product_id']), $data['product_variant_id'] ?? null, $data['quantity']);

        return response()->json(['message' => 'Item added to cart.', 'data' => $item->load('product')], 201);
    }

    public function destroy(Request $request, CartItem $cartItem)
    {
        abort_unless($cartItem->cart->user_id === $request->user()->id, 403);
        $cartItem->delete();

        return response()->json(['message' => 'Item removed.']);
    }
}
