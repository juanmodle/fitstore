<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    public function run(): void
    {
        $coupons = [
            ['WELCOME10', 10, null, 200, false, now()->subWeek(), now()->addMonths(2), 'active'],
            ['VIP15', 15, null, 100, true, now()->subWeek(), now()->addMonths(2), 'active'],
            ['VIP20', 20, null, 100, true, now()->subWeek(), now()->addMonths(2), 'active'],
            ['PROTEIN15', 15, null, 150, false, now()->subWeek(), now()->addMonths(2), 'active'],
            ['FREESHIPPING', null, 4.95, 300, false, now()->subWeek(), now()->addMonths(2), 'active'],
            ['EJEMPLO5', 5, null, 50, false, now()->subMonths(2), now()->subDays(5), 'active'],
            ['VIPCADUCADO', 25, null, 20, true, now()->subMonths(2), now()->subDays(2), 'active'],
        ];

        foreach ($coupons as [$code, $percentage, $fixedAmount, $limit, $vipOnly, $startsAt, $endsAt, $status]) {
            Coupon::updateOrCreate(
                ['code' => $code],
                [
                    'description' => $code . ' cupon de ejemplo.',
                    'percentage' => $percentage,
                    'fixed_amount' => $fixedAmount,
                    'starts_at' => $startsAt,
                    'ends_at' => $endsAt,
                    'usage_limit' => $limit,
                    'is_vip_only' => $vipOnly,
                    'status' => $status,
                ]
            );
        }
    }
}
