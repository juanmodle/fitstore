<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with('category', 'tags')
            ->with('translations')
            ->published()
            ->when($request->filled('category'), fn ($query) => $query->whereHas('category', fn ($q) => $q->where('slug', $request->category)))
            ->when($request->filled('tag'), fn ($query) => $query->whereHas('tags', fn ($q) => $q->where('slug', $request->tag)))
            ->latest('published_at')
            ->paginate(9);

        return view('blog.index', [
            'posts' => $posts,
            'categories' => PostCategory::all(),
            'tags' => Tag::has('posts')->get(),
        ]);
    }

    public function show(Post $post)
    {
        abort_if($post->status !== 'published' || ($post->published_at && $post->published_at->isFuture()), 404);

        return view('blog.show', [
            'post' => $post->load(['category', 'tags', 'comments.user', 'translations']),
        ]);
    }

    public function storeComment(Request $request, Post $post)
    {
        $data = $request->validate([
            'content' => ['required', 'string', 'max:1000'],
        ]);

        Comment::create([
            'post_id' => $post->id,
            'user_id' => $request->user()->id,
            'content' => $data['content'],
            'status' => 'pending',
        ]);

        return back()->with('success', 'Your comment is waiting for moderation.');
    }
}
