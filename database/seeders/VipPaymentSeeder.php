<?php

namespace Database\Seeders;

use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\VipPayment;
use App\Models\VipSubscription;
use Illuminate\Database\Seeder;

class VipPaymentSeeder extends Seeder
{
    public function run(): void
    {
        $subscription = VipSubscription::with('user')->first();
        $method = PaymentMethod::where('code', 'credit_card')->first();

        if (! $subscription) {
            return;
        }

        $payment = Payment::updateOrCreate(
            ['transaction_id' => 'VIP-SEED-' . $subscription->id],
            [
                'user_id' => $subscription->user_id,
                'vip_subscription_id' => $subscription->id,
                'payment_method_id' => $method?->id,
                'amount' => 15.00,
                'status' => 'paid',
                'payment_date' => now(),
                'notes' => 'Seeded VIP payment',
            ]
        );

        VipPayment::updateOrCreate(
            ['vip_subscription_id' => $subscription->id, 'payment_id' => $payment->id],
            ['amount' => 15.00, 'paid_at' => now(), 'status' => 'paid']
        );
    }
}
