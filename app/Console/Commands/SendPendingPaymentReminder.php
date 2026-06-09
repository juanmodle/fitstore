<?php

namespace App\Console\Commands;

use App\Models\Notification;
use App\Models\Order;
use Illuminate\Console\Command;

class SendPendingPaymentReminder extends Command
{
    protected $signature = 'payments:send-pending-reminders';

    protected $description = 'Create reminders for orders with pending payment.';

    public function handle(): int
    {
        $orders = Order::where('payment_status', 'pending')->latest()->take(20)->get();

        foreach ($orders as $order) {
            Notification::create([
                'user_id' => $order->user_id,
                'title' => 'Pending payment',
                'message' => "Order {$order->order_number} is waiting for payment.",
            ]);
        }

        $this->info("Reminders created: {$orders->count()}");

        return self::SUCCESS;
    }
}
