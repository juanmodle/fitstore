<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Document>
 */
class DocumentFactory extends Factory
{
    protected $model = Document::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'title' => fake()->words(3, true),
            'description' => fake()->sentence(),
            'document_type' => fake()->randomElement(['invoice', 'guide', 'legal']),
            'file_path' => 'documents/example.pdf',
            'related_model' => null,
            'related_id' => null,
        ];
    }
}
