<?php

namespace Database\Factories;

use App\Models\ProductTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProductTranslation>
 */
class ProductTranslationFactory extends Factory
{
    protected $model = ProductTranslation::class;

    public function definition(): array
    {
        return [
            'product_id' => \App\Models\Product::factory(),
            'locale' => fake()->randomElement(['en', 'es']),
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
        ];
    }
}
