<?php

namespace App\Livewire;

use App\Models\PaymentMethod;
use Livewire\Component;

class VipSubscriptionBox extends Component
{
    public ?int $paymentMethodId = null;
    public ?string $message = null;

    public function mount(): void
    {
        $this->paymentMethodId = PaymentMethod::where('is_active', true)->first()?->id;
    }

    public function subscribe(): void
    {
        $this->validate(['paymentMethodId' => ['required', 'exists:payment_methods,id']]);

        auth()->user()->subscribeVip($this->paymentMethodId);
        $this->message = 'Your VIP subscription is active.';
    }

    public function render()
    {
        return view('livewire.vip-subscription-box', [
            'subscription' => auth()->user()?->vipSubscription,
            'paymentMethods' => PaymentMethod::where('is_active', true)->get(),
        ]);
    }
}
