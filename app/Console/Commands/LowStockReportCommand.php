<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class LowStockReportCommand extends Command
{
    protected $signature = 'fitstore:low-stock-report';

    protected $description = 'Shows products with low stock.';

    public function handle(): int
    {
        $products = Product::where('stock', '<=', 10)
            ->orderBy('stock')
            ->get();

        $rows = $products->map(fn ($product) => [$product->name, $product->stock]);

        $this->table(['Product', 'Stock'], $rows);
        $this->info('Low stock products found: ' . $products->count());

        return self::SUCCESS;
    }
}
