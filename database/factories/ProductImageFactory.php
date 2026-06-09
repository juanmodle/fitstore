<?php

namespace Database\Factories;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductImage>
 */
class ProductImageFactory extends Factory
{
    protected $model = ProductImage::class;

    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::factory(),
            'image_path' => 'https://placehold.co/900x900?text=Product',
            'alt_text' => fake()->words(3, true),
            'is_main' => false,
            'sort_order' => 0,
        ];
    }
}
