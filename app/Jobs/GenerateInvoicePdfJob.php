<?php

namespace App\Jobs;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;

class GenerateInvoicePdfJob implements ShouldQueue
{
    use Queueable;

    public function __construct(public int $orderId)
    {
    }

    public function handle(): void
    {
        $order = Order::with('items', 'user')->find($this->orderId);

        if (! $order) {
            return;
        }

        $pdf = Pdf::loadView('pdf.invoice', ['order' => $order]);
        Storage::put('invoices/' . $order->order_number . '.pdf', $pdf->output());
    }
}
