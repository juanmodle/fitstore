<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Category::where('status', 'active')->paginate(12)]);
    }

    public function show(Category $category)
    {
        return response()->json(['data' => $category->load('products')]);
    }
}
