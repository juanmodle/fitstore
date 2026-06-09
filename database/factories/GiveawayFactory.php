<?php

namespace Database\Factories;

use App\Models\Giveaway;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Giveaway>
 */
class GiveawayFactory extends Factory
{
    protected $model = Giveaway::class;

    public function definition(): array
    {
        return [
            'title' => fake()->words(4, true),
            'description' => fake()->paragraph(),
            'prize' => fake()->words(3, true),
            'start_date' => now()->subDays(2),
            'end_date' => now()->addDays(20),
            'status' => 'active',
            'winner_user_id' => null,
        ];
    }
}
