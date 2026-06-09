<?php

namespace App\Listeners;

use App\Events\OrderPaid;
use App\Jobs\GenerateInvoicePdfJob;
use App\Jobs\SendOrderConfirmationEmailJob;

class SendOrderConfirmationListener
{
    public function handle(OrderPaid $event): void
    {
        SendOrderConfirmationEmailJob::dispatch($event->order->id);
        GenerateInvoicePdfJob::dispatch($event->order->id);
    }
}
