<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Mail\OrderConfirmationMail;
use App\Models\EmailLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendOrderConfirmationEmail implements ShouldQueue
{
    public function handle(OrderCreated $event): void
    {
        Mail::to($event->order->user->email)->queue(new OrderConfirmationMail($event->order));

        EmailLog::create([
            'user_id' => $event->order->user_id,
            'email_to' => $event->order->user->email,
            'subject' => 'Order confirmation',
            'status' => 'queued',
            'sent_at' => now(),
        ]);
    }
}
