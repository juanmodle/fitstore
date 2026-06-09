<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Post;

class PostController extends BaseCrudController
{
    protected string $model = Post::class;
}
