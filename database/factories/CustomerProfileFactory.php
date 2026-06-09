<?php

namespace Database\Factories;

use App\Models\CustomerProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CustomerProfile>
 */
class CustomerProfileFactory extends Factory
{
    protected $model = CustomerProfile::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'phone' => fake()->phoneNumber(),
            'birth_date' => fake()->date(),
            'gender' => fake()->randomElement(['male', 'female', 'other']),
            'is_vip' => false,
            'points' => fake()->numberBetween(0, 400),
        ];
    }
}
