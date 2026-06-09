<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        $customer = User::where('email', 'cliente@gmail.com')->first();
        $vip = User::where('email', 'vip@gmail.com')->first();

        if (! $customer) {
            return;
        }

        $cart = Cart::updateOrCreate(['user_id' => $customer->id, 'status' => 'active']);

        foreach (Product::take(2)->get() as $product) {
            $cart->items()->updateOrCreate(
                ['product_id' => $product->id, 'product_variant_id' => null],
                ['quantity' => 1, 'unit_price' => $product->sale_price ?: $product->price]
            );
        }

        if ($vip) {
            $oldCart = Cart::updateOrCreate(['user_id' => $vip->id, 'status' => 'active']);

            foreach (Product::skip(2)->take(2)->get() as $product) {
                $oldCart->items()->updateOrCreate(
                    ['product_id' => $product->id, 'product_variant_id' => null],
                    ['quantity' => 1, 'unit_price' => $product->sale_price ?: $product->price]
                );
            }

            $oldCart->forceFill([
                'created_at' => now()->subDays(45),
                'updated_at' => now()->subDays(45),
            ])->save();
        }
    }
}
