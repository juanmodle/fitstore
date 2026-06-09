<?php

namespace Database\Seeders;

use App\Models\Coupon;
use App\Models\Discount;
use App\Models\User;
use Illuminate\Database\Seeder;

class CouponDiscountSeeder extends Seeder
{
    public function run(): void
    {
        Coupon::query()->firstOrCreate([
            'code' => 'WELCOME10',
        ], [
            'percentage_discount' => 10,
            'start_date' => now()->subDay(),
            'end_date' => now()->addMonths(2),
            'usage_limit' => 100,
            'is_vip_only' => false,
            'is_active' => true,
        ]);

        $vipCoupon = Coupon::query()->firstOrCreate([
            'code' => 'VIP15',
        ], [
            'percentage_discount' => 15,
            'start_date' => now()->subDay(),
            'end_date' => now()->addMonths(2),
            'usage_limit' => 50,
            'is_vip_only' => true,
            'is_active' => true,
        ]);

        $vip = User::where('email', 'vip@gmail.com')->first();

        if ($vip) {
            $vipCoupon->users()->syncWithoutDetaching([$vip->id => ['times_used' => 0]]);
        }

        Discount::query()->firstOrCreate([
            'name' => 'VIP Monthly Discount',
        ], [
            'description' => 'Exclusive VIP discount.',
            'percentage' => 15,
            'start_date' => now()->subDay(),
            'end_date' => now()->addMonth(),
            'is_vip_only' => true,
            'is_active' => true,
        ]);
    }
}
