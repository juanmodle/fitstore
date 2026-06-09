<?php

namespace Database\Factories;

use App\Models\VipPayment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VipPayment>
 */
class VipPaymentFactory extends Factory
{
    protected $model = VipPayment::class;

    public function definition(): array
    {
        return [
            'vip_subscription_id' => \App\Models\VipSubscription::factory(),
            'payment_id' => null,
            'amount' => 15.00,
            'paid_at' => now(),
            'status' => 'paid',
        ];
    }
}
