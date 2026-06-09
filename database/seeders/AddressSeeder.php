<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    public function run(): void
    {
        foreach (User::all() as $user) {
            foreach (['shipping', 'billing'] as $type) {
                Address::updateOrCreate(
                    ['user_id' => $user->id, 'type' => $type],
                    [
                        'name' => $user->name,
                        'street' => 'Fitness Street ' . $user->id,
                        'city' => 'Madrid',
                        'province' => 'Madrid',
                        'postal_code' => '2800' . $user->id,
                        'country' => 'Spain',
                        'phone' => optional($user->profile)->phone ?: '600000000',
                        'is_default' => true,
                    ]
                );
            }
        }
    }
}
