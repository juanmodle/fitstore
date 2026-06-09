<?php

namespace Database\Seeders;

use App\Models\Giveaway;
use App\Models\User;
use Illuminate\Database\Seeder;

class GiveawayEntrySeeder extends Seeder
{
    public function run(): void
    {
        $vip = User::where('email', 'vip@gmail.com')->first();

        if (! $vip) {
            return;
        }

        $giveaways = Giveaway::whereIn('status', ['active', 'in_progress'])->get();

        foreach ($giveaways as $giveaway) {
            $giveaway->entries()->updateOrCreate(
                ['user_id' => $vip->id],
                ['joined_at' => now()]
            );
        }
    }
}
