<?php

namespace Database\Seeders;

use App\Models\MediaAsset;
use App\Models\User;
use Illuminate\Database\Seeder;

class MediaAssetSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'administrador@gmail.com')->first();

        foreach (['hero.jpg', 'protein.jpg', 'clothing.jpg'] as $file) {
            MediaAsset::updateOrCreate(
                ['file_path' => 'media/' . $file],
                [
                    'uploaded_by_user_id' => $admin?->id,
                    'file_type' => 'image/jpeg',
                    'file_size' => 200000,
                    'alt_text' => 'FITSTORE ' . $file,
                ]
            );
        }
    }
}
