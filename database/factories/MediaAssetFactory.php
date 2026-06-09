<?php

namespace Database\Factories;

use App\Models\MediaAsset;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MediaAsset>
 */
class MediaAssetFactory extends Factory
{
    protected $model = MediaAsset::class;

    public function definition(): array
    {
        return [
            'uploaded_by_user_id' => \App\Models\User::factory(),
            'file_path' => 'media/example.jpg',
            'file_type' => 'image/jpeg',
            'file_size' => 123456,
            'alt_text' => fake()->words(3, true),
            'related_model' => null,
            'related_id' => null,
        ];
    }
}
