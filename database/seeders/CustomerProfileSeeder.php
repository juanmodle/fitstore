<?php

namespace Database\Seeders;

use App\Models\CustomerProfile;
use App\Models\User;
use Illuminate\Database\Seeder;

class CustomerProfileSeeder extends Seeder
{
    public function run(): void
    {
        foreach (User::all() as $user) {
            CustomerProfile::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'phone' => '600 100 20' . $user->id,
                    'birth_date' => now()->subYears(24 + $user->id)->toDateString(),
                    'gender' => 'other',
                    'is_vip' => $user->hasRole('vip_customer'),
                    'points' => $user->hasRole('vip_customer') ? 450 : 80,
                ]
            );
        }
    }
}
