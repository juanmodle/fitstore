<?php

namespace App\Jobs;

use App\Mail\LowStockAlertMail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendLowStockAlertEmailJob
{
    use Queueable;

    public function __construct(public int $productId)
    {
    }

    public function handle(): void
    {
        $product = Product::find($this->productId);
        $admin = User::where('email', 'administrador@gmail.com')->first();

        if ($product && $admin) {
            Mail::to($admin->email)->send(new LowStockAlertMail($product));
        }
    }
}
