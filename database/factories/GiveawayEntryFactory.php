<?php

namespace Database\Factories;

use App\Models\GiveawayEntry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<GiveawayEntry>
 */
class GiveawayEntryFactory extends Factory
{
    protected $model = GiveawayEntry::class;

    public function definition(): array
    {
        return [
            'giveaway_id' => \App\Models\Giveaway::factory(),
            'user_id' => \App\Models\User::factory(),
            'joined_at' => now(),
        ];
    }
}
