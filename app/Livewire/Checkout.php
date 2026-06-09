<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\PaymentMethod;
use App\Rules\ActiveCouponCode;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Checkout extends Component
{
    public ?int $shippingAddressId = null;
    public ?int $billingAddressId = null;
    public ?int $paymentMethodId = null;
    public string $couponCode = '';
    public string $notes = '';
    public ?string $notice = null;

    public function mount(): void
    {
        $address = auth()->user()->addresses()->where('is_default', true)->first() ?: auth()->user()->addresses()->first();
        $method = PaymentMethod::where('is_active', true)->first();

        $this->shippingAddressId = $address?->id;
        $this->billingAddressId = $address?->id;
        $this->paymentMethodId = $method?->id;
        $this->couponCode = session('coupon_code', '');
    }

    public function confirm()
    {
        $this->validate([
            'shippingAddressId' => ['required', 'exists:addresses,id'],
            'billingAddressId' => ['required', 'exists:addresses,id'],
            'paymentMethodId' => ['required', 'exists:payment_methods,id'],
            'couponCode' => ['nullable', 'string', 'max:50', new ActiveCouponCode(auth()->user())],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        try {
            $order = Order::createFromCart(auth()->user(), [
                'shipping_address_id' => $this->shippingAddressId,
                'billing_address_id' => $this->billingAddressId,
                'payment_method_id' => $this->paymentMethodId,
                'coupon_code' => $this->couponCode,
                'notes' => $this->notes,
            ]);
        } catch (ValidationException $exception) {
            $this->notice = $exception->validator->errors()->first();
            return null;
        }

        return redirect()->route('checkout.confirmation', $order);
    }

    public function render()
    {
        return view('livewire.checkout', [
            'addresses' => auth()->user()->addresses,
            'paymentMethods' => PaymentMethod::where('is_active', true)->get(),
        ]);
    }
}
