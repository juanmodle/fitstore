<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateDailySalesReportCommand extends Command
{
    protected $signature = 'fitstore:daily-sales-report';

    protected $description = 'Generates a simple sales report audit log.';

    public function handle(): int
    {
        $total = \App\Models\Order::whereDate('created_at', today())->sum('total_price');
        \App\Models\AuditLog::create([
            'action' => 'daily_sales_report',
            'table_name' => 'orders',
            'new_values' => ['total' => $total],
        ]);
        $this->info('Today sales: ' . number_format($total, 2) . ' EUR');
        return self::SUCCESS;
    }
}
