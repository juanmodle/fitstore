<?php

namespace App\Livewire;

use App\Models\PaymentMethod;
use Livewire\Component;

class VipSubscriptionComponent extends Component
{
    public ?int $payment_method_id = null;

    public function render()
    {
        return view('livewire.vip-subscription-component', [
            'paymentMethods' => PaymentMethod::where('is_active', true)->get(),
            'subscription' => auth()->user()?->vipSubscriptions()->active()->first(),
        ]);
    }
}
