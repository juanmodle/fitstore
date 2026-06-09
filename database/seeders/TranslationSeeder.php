<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Database\Seeder;

class TranslationSeeder extends Seeder
{
    public function run(): void
    {
        $locales = ['en', 'es'];

        foreach (Product::all() as $product) {
            foreach ($locales as $locale) {
                $product->translations()->updateOrCreate(
                    ['locale' => $locale],
                    [
                        'name' => $locale === 'es' ? $this->spanishProductName($product->name) : $product->name,
                        'description' => $locale === 'es' ? $this->spanishProductDescription($product->name) : strip_tags($product->description),
                    ]
                );
            }
        }

        foreach (Category::all() as $category) {
            foreach ($locales as $locale) {
                $category->translations()->updateOrCreate(
                    ['locale' => $locale],
                    [
                        'name' => $locale === 'es' ? $this->spanishCategoryName($category->name) : $category->name,
                        'description' => $category->description,
                    ]
                );
            }
        }

        foreach (Post::all() as $post) {
            foreach ($locales as $locale) {
                $post->translations()->updateOrCreate(
                    ['locale' => $locale],
                    ['title' => $post->title . ' ' . strtoupper($locale), 'excerpt' => $post->excerpt, 'content' => strip_tags($post->content) . ' Translation ' . $locale]
                );
            }
        }
    }

    private function spanishProductName(string $name): string
    {
        return match ($name) {
            'Whey Protein Chocolate' => 'Proteina Whey Chocolate',
            'Whey Protein Vanilla' => 'Proteina Whey Vainilla',
            'Multivitamin Complex' => 'Complejo Multivitaminico',
            'Omega 3 Capsules' => 'Capsulas Omega 3',
            'Pre Workout Energy' => 'Pre Entreno Energia',
            'BCAA Recovery Drink' => 'Bebida Recuperacion BCAA',
            'Peanut Butter Natural' => 'Crema de Cacahuete Natural',
            'Oat Flour Chocolate' => 'Harina de Avena Chocolate',
            'Protein Pancake Mix' => 'Mezcla Tortitas Proteicas',
            'Zero Sauce Barbecue' => 'Salsa Zero Barbacoa',
            'Rice Cream Vanilla' => 'Crema de Arroz Vainilla',
            'Almond Cream' => 'Crema de Almendra',
            'Chocolate Protein Bar' => 'Barrita Proteica Chocolate',
            'Cookies Protein Bar' => 'Barrita Proteica Cookies',
            'Coconut Protein Bar' => 'Barrita Proteica Coco',
            'Peanut Protein Bar' => 'Barrita Proteica Cacahuete',
            'White Chocolate Protein Bar' => 'Barrita Proteica Chocolate Blanco',
            'Brownie Protein Bar' => 'Barrita Proteica Brownie',
            'Creatine Monohydrate' => 'Creatina Monohidrato',
            'Creatine Creapure' => 'Creatina Creapure',
            'Creatine Capsules' => 'Capsulas de Creatina',
            'Creatine Lemon Powder' => 'Creatina Limon en Polvo',
            'Creatine Gummies' => 'Gominolas de Creatina',
            'Creatine Recovery Mix' => 'Mezcla Recuperacion Creatina',
            'Men Training T-Shirt' => 'Camiseta Entrenamiento Hombre',
            'Men Oversize Hoodie' => 'Sudadera Oversize Hombre',
            'Men Gym Shorts' => 'Pantalon Corto Gym Hombre',
            'Men Compression Shirt' => 'Camiseta Compresion Hombre',
            'Men Joggers' => 'Joggers Hombre',
            'Men Tank Top' => 'Camiseta Tirantes Hombre',
            'Women Sport Leggings' => 'Leggings Deportivos Mujer',
            'Women Crop Top' => 'Crop Top Mujer',
            'Women Training T-Shirt' => 'Camiseta Entrenamiento Mujer',
            'Women Sports Bra' => 'Sujetador Deportivo Mujer',
            'Women Hoodie' => 'Sudadera Mujer',
            'Women Biker Shorts' => 'Mallas Cortas Mujer',
            'Lifting Belt' => 'Cinturon Levantamiento',
            'Training Gloves' => 'Guantes Entrenamiento',
            'Wrist Straps' => 'Correas de Muneca',
            'Shaker Bottle' => 'Shaker',
            'Mobile Phone Holder' => 'Soporte Movil',
            'Gym Backpack' => 'Mochila Gym',
            default => $name,
        };
    }

    private function spanishCategoryName(string $name): string
    {
        return match ($name) {
            'Supplements' => 'Suplementos',
            'Fit Food' => 'Comida Fit',
            'Protein Bars' => 'Barritas Proteicas',
            'Creatine' => 'Creatina',
            'Men Clothing' => 'Ropa Hombre',
            'Women Clothing' => 'Ropa Mujer',
            'Accessories' => 'Accesorios',
            default => $name,
        };
    }

    private function spanishProductDescription(string $name): string
    {
        return $this->spanishProductName($name) . ' es un producto de ejemplo de FITSTORE con descripcion sencilla, buena calidad, envio rapido y preparado para variantes y descuentos.';
    }
}
