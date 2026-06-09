<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Str;
use Livewire\Component;

class AdminPostManager extends Component
{
    public ?int $postId = null;
    public ?int $postCategoryId = null;
    public string $title = '';
    public string $slug = '';
    public string $excerpt = '';
    public string $content = '';
    public string $status = 'draft';

    public function updatedTitle(): void
    {
        $this->slug = Str::slug($this->title);
    }

    public function save(): void
    {
        $data = $this->validate([
            'postCategoryId' => ['nullable', 'exists:post_categories,id'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'status' => ['required', 'in:draft,published'],
        ]);

        Post::updateOrCreate(['id' => $this->postId], [
            'user_id' => auth()->id(),
            'post_category_id' => $data['postCategoryId'],
            'title' => $data['title'],
            'slug' => $data['slug'],
            'excerpt' => $data['excerpt'],
            'content' => $data['content'],
            'status' => $data['status'],
            'published_at' => $data['status'] === 'published' ? now() : null,
        ]);

        $this->reset(['postId', 'postCategoryId', 'title', 'slug', 'excerpt', 'content']);
        $this->status = 'draft';
    }

    public function edit(int $id): void
    {
        $post = Post::findOrFail($id);
        $this->postId = $post->id;
        $this->postCategoryId = $post->post_category_id;
        $this->title = $post->title;
        $this->slug = $post->slug;
        $this->excerpt = (string) $post->excerpt;
        $this->content = $post->content;
        $this->status = $post->status;
    }

    public function delete(int $id): void
    {
        Post::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin-post-manager', [
            'posts' => Post::with('category')->latest()->get(),
            'categories' => PostCategory::orderBy('name')->get(),
        ]);
    }
}
