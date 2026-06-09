<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        return view('admin.simple.form', [
            'title' => 'Create post',
            'route' => 'posts',
            'model' => new Post(),
            'fields' => ['title', 'slug', 'excerpt', 'content', 'image', 'status', 'post_category_id'],
            'options' => ['post_category_id' => PostCategory::pluck('name', 'id')],
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['published_at'] = $data['status'] === 'published' ? now() : null;

        Post::create($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post created.');
    }

    public function edit(Post $post)
    {
        return view('admin.simple.form', [
            'title' => 'Edit post',
            'route' => 'posts',
            'model' => $post,
            'fields' => ['title', 'slug', 'excerpt', 'content', 'image', 'status', 'post_category_id'],
            'options' => ['post_category_id' => PostCategory::pluck('name', 'id')],
        ]);
    }

    public function update(StorePostRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['published_at'] = $data['status'] === 'published' ? ($post->published_at ?: now()) : null;
        $post->update($data);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated.');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted.');
    }
}
