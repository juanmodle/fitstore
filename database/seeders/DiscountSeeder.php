<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Seeder;

class DiscountSeeder extends Seeder
{
    public function run(): void
    {
        $discounts = [
            ['Summer Sale', 15, null, false],
            ['VIP Protein Discount', 20, null, true],
            ['Creatine Week', 12, null, false],
            ['New Customer Offer', 10, null, false],
        ];

        foreach ($discounts as [$name, $percentage, $fixedAmount, $vipOnly]) {
            Discount::updateOrCreate(
                ['name' => $name],
                [
                    'description' => $name . ' for FITSTORE customers.',
                    'percentage' => $percentage,
                    'fixed_amount' => $fixedAmount,
                    'starts_at' => now()->subWeek(),
                    'ends_at' => now()->addMonth(),
                    'is_vip_only' => $vipOnly,
                    'status' => 'active',
                ]
            );
        }
    }
}
