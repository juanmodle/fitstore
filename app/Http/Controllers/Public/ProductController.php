<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function show(Product $product)
    {
        abort_if($product->status !== 'active', 404);

        return view('products.show', [
            'product' => $product->load(['images', 'variants', 'tags', 'category.translations', 'brand', 'translations']),
            'relatedProducts' => Product::with('mainImage', 'category.translations', 'translations')
                ->active()
                ->where('category_id', $product->category_id)
                ->whereKeyNot($product->id)
                ->take(4)
                ->get(),
        ]);
    }
}
