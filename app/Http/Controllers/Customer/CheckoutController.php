<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CartItemRequest;
use App\Http\Requests\OrderRequest;
use App\Models\Address;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function addCartItem(CartItemRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $product = Product::findOrFail($data['product_id']);
        Cart::addItemForUser($request->user(), $product, $data['product_variant_id'] ?? null, (int) $data['quantity']);

        return redirect()->route('cart.index')->with('success', 'Product added to cart.');
    }

    public function removeCartItem(Request $request, CartItem $cartItem): RedirectResponse
    {
        abort_unless($cartItem->cart->user_id === $request->user()->id, 403);

        $cartItem->delete();

        return back()->with('success', 'Item removed.');
    }

    public function create(): View
    {
        return view('checkout.index');
    }

    public function store(OrderRequest $request): RedirectResponse
    {
        $shippingAddress = $this->addressFromText($request, 'shipping_address', 'shipping');
        $billingAddress = $this->addressFromText($request, 'billing_address', 'billing');
        $paymentMethod = PaymentMethod::where('is_active', true)->firstOrFail();

        try {
            $order = Order::createFromCart($request->user(), [
                'shipping_address_id' => $shippingAddress->id,
                'billing_address_id' => $billingAddress->id,
                'payment_method_id' => $paymentMethod->id,
                'coupon_code' => $request->string('coupon_code')->toString(),
                'notes' => 'Order created from checkout form.',
            ]);
        } catch (ValidationException $exception) {
            return back()->withErrors($exception->errors())->withInput();
        }

        return redirect()->route('customer.orders.show', $order)->with('success', 'Order created.');
    }

    private function addressFromText(OrderRequest $request, string $field, string $type): Address
    {
        $text = $request->string($field)->toString();

        return Address::firstOrCreate(
            [
                'user_id' => $request->user()->id,
                'type' => $type,
                'street' => $text,
            ],
            [
                'name' => $request->user()->name,
                'city' => 'Madrid',
                'province' => 'Madrid',
                'postal_code' => '00000',
                'country' => 'Spain',
                'is_default' => false,
            ]
        );
    }
}
