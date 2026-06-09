<?php

namespace Database\Factories;

use App\Models\VipSubscription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VipSubscription>
 */
class VipSubscriptionFactory extends Factory
{
    protected $model = VipSubscription::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'start_date' => now(),
            'end_date' => now()->addMonth(),
            'status' => 'active',
            'monthly_price' => 15.00,
            'payment_method_id' => \App\Models\PaymentMethod::factory(),
        ];
    }
}
