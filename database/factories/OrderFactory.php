<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'order_number' => 'FS-' . now()->format('Ymd') . '-' . strtoupper(fake()->bothify('???###')),
            'user_id' => \App\Models\User::factory(),
            'status' => 'processing',
            'total_price' => fake()->randomFloat(2, 20, 200),
            'shipping_price' => 4.95,
            'discount_amount' => 0,
            'payment_status' => 'paid',
            'shipping_address_id' => null,
            'billing_address_id' => null,
            'notes' => null,
        ];
    }
}
