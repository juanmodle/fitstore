<?php

namespace App\Listeners;

use App\Events\ProductLowStock;
use App\Mail\LowStockAlertMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class NotifyProductLowStockListener
{
    public function handle(ProductLowStock $event): void
    {
        $admin = User::where('email', 'administrador@gmail.com')->first();

        if ($admin) {
            Mail::to($admin->email)->send(new LowStockAlertMail($event->product));
        }
    }
}
