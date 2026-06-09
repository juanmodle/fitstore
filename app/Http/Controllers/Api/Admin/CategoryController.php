<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Category;

class CategoryController extends BaseCrudController
{
    protected string $model = Category::class;
}
