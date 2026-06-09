<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Order::all() as $order) {
            foreach (Product::take(2)->get() as $product) {
                $order->items()->updateOrCreate(
                    ['product_id' => $product->id],
                    [
                        'product_name' => $product->name,
                        'quantity' => 1,
                        'unit_price' => $product->sale_price ?: $product->price,
                        'total_price' => $product->sale_price ?: $product->price,
                    ]
                );
            }
        }
    }
}
