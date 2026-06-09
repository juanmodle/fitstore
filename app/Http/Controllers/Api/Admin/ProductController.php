<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Product;

class ProductController extends BaseCrudController
{
    protected string $model = Product::class;
}
