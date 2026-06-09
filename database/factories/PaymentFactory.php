<?php

namespace Database\Factories;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Payment>
 */
class PaymentFactory extends Factory
{
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'order_id' => null,
            'vip_subscription_id' => null,
            'payment_method_id' => \App\Models\PaymentMethod::factory(),
            'amount' => fake()->randomFloat(2, 10, 200),
            'status' => 'paid',
            'transaction_id' => strtoupper(fake()->bothify('MOCK-#####')), 
            'payment_date' => now(),
            'notes' => fake()->sentence(),
        ];
    }
}
