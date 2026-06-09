<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $method = PaymentMethod::where('code', 'credit_card')->first();

        foreach (Order::all() as $order) {
            $isPaid = $order->payment_status === 'paid';

            Payment::updateOrCreate(
                ['transaction_id' => 'ORDER-' . $order->order_number],
                [
                    'user_id' => $order->user_id,
                    'order_id' => $order->id,
                    'payment_method_id' => $method?->id,
                    'amount' => $order->total_price,
                    'status' => $isPaid ? 'paid' : 'pending',
                    'payment_date' => $isPaid ? now() : null,
                    'notes' => 'Pago de pedido de ejemplo',
                ]
            );
        }
    }
}
