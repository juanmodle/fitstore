<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Post::with('category', 'tags')->published()->paginate(12)]);
    }

    public function show(Post $post)
    {
        return response()->json(['data' => $post->load('category', 'tags', 'comments')]);
    }
}
