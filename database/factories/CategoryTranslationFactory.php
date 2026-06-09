<?php

namespace Database\Factories;

use App\Models\CategoryTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CategoryTranslation>
 */
class CategoryTranslationFactory extends Factory
{
    protected $model = CategoryTranslation::class;

    public function definition(): array
    {
        return [
            'category_id' => \App\Models\Category::factory(),
            'locale' => fake()->randomElement(['en', 'es']),
            'name' => fake()->words(2, true),
            'description' => fake()->sentence(),
        ];
    }
}
