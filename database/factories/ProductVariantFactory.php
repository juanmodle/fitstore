<?php

namespace Database\Factories;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    protected $model = ProductVariant::class;

    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::factory(),
            'size' => fake()->randomElement(['S', 'M', 'L', null]),
            'color' => fake()->randomElement(['Black', 'White', 'Red', null]),
            'flavor' => fake()->randomElement(['Chocolate', 'Vanilla', 'Lemon', null]),
            'weight' => fake()->randomElement(['500g', '1kg', null]),
            'extra_price' => fake()->randomFloat(2, 0, 8),
            'stock' => fake()->numberBetween(5, 80),
            'sku' => strtoupper(fake()->bothify('FS-###-???')),
        ];
    }
}
