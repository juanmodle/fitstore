<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = ['FitStore Nutrition', 'PowerFuel', 'IronLab', 'ActiveWear', 'GymCore', 'PureFit'];

        foreach ($brands as $brand) {
            Brand::updateOrCreate(
                ['slug' => Str::slug($brand)],
                [
                    'name' => $brand,
                    'description' => $brand . ' is an example brand created for the FITSTORE catalog.',
                    'logo' => 'https://placehold.co/500x220/ffffff/111827?text=' . urlencode($brand),
                ]
            );
        }
    }
}
