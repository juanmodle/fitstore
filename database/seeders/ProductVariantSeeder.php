<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    public function run(): void
    {
        foreach (Product::with('category')->get() as $product) {
            $category = $product->category?->name;

            if (str_contains((string) $category, 'Clothing')) {
                foreach (['S', 'M', 'L'] as $size) {
                    $product->variants()->updateOrCreate(
                        ['sku' => 'FS-' . $product->id . '-' . $size],
                        ['size' => $size, 'color' => 'Black', 'extra_price' => 0, 'stock' => 12]
                    );
                }
            } elseif (in_array($category, ['Supplements', 'Creatine', 'Fit Food'])) {
                foreach (['Chocolate', 'Vanilla'] as $flavor) {
                    $product->variants()->updateOrCreate(
                        ['sku' => 'FS-' . $product->id . '-' . strtoupper(substr($flavor, 0, 3))],
                        ['flavor' => $flavor, 'weight' => '1kg', 'extra_price' => $flavor === 'Vanilla' ? 1.50 : 0, 'stock' => 18]
                    );
                }
            } else {
                $product->variants()->updateOrCreate(
                    ['sku' => 'FS-' . $product->id . '-STD'],
                    ['size' => 'One Size', 'extra_price' => 0, 'stock' => 20]
                );
            }
        }
    }
}
