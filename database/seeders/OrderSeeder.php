<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $orders = [
            ['FS-EJEMPLO-001', 'cliente@gmail.com', 'delivered', 'paid', 49.90, 4.95, 0],
            ['FS-EJEMPLO-002', 'vip@gmail.com', 'delivered', 'paid', 64.90, 4.95, 5],
            ['FS-EJEMPLO-003', 'cliente@gmail.com', 'pending', 'pending', 39.90, 4.95, 0],
        ];

        foreach ($orders as [$number, $email, $status, $paymentStatus, $total, $shipping, $discount]) {
            $user = User::where('email', $email)->first();
            $address = $user?->addresses()->first();

            if ($user && $address) {
                Order::updateOrCreate(
                    ['order_number' => $number],
                    [
                        'user_id' => $user->id,
                        'status' => $status,
                        'total_price' => $total,
                        'shipping_price' => $shipping,
                        'discount_amount' => $discount,
                        'payment_status' => $paymentStatus,
                        'shipping_address_id' => $address->id,
                        'billing_address_id' => $address->id,
                        'notes' => 'Pedido de ejemplo',
                    ]
                );
            }
        }
    }
}
