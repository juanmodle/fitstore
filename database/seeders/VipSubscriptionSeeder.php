<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use App\Models\User;
use App\Models\VipSubscription;
use Illuminate\Database\Seeder;

class VipSubscriptionSeeder extends Seeder
{
    public function run(): void
    {
        $vip = User::where('email', 'vip@gmail.com')->first();
        $method = PaymentMethod::where('code', 'credit_card')->first();

        if ($vip) {
            VipSubscription::updateOrCreate(
                ['user_id' => $vip->id, 'status' => 'active'],
                [
                    'start_date' => now()->subDays(10)->toDateString(),
                    'end_date' => now()->addDays(20)->toDateString(),
                    'monthly_price' => 15.00,
                    'payment_method_id' => $method?->id,
                ]
            );
        }
    }
}
