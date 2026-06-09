<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::with('category', 'brand')->latest()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.products.form', ['product' => null]);
    }

    public function store(Request $request)
    {
        return redirect()->route('admin.products.create');
    }

    public function edit(Product $product)
    {
        return view('admin.products.form', ['product' => $product->load('mainImage')]);
    }

    public function update(Request $request, Product $product)
    {
        return redirect()->route('admin.products.edit', $product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('success', 'Product deleted.');
    }
}
