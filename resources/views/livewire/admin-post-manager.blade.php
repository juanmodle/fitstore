<div class="grid gap-6 lg:grid-cols-[420px_1fr]">
    <form wire:submit="save" class="grid gap-4 rounded-lg bg-white p-5 shadow-sm">
        <h2 class="font-black">{{ $postId ? 'Edit post' : 'Create post' }}</h2>
        <select class="field" wire:model="postCategoryId"><option value="">Category</option>@foreach($categories as $category)<option value="{{ $category->id }}">{{ $category->name }}</option>@endforeach</select>
        <input class="field" wire:model.live="title" placeholder="Title">
        <input class="field" wire:model="slug" placeholder="Slug">
        <textarea class="field" wire:model="excerpt" placeholder="Excerpt"></textarea>
        <textarea class="field" rows="6" wire:model="content" placeholder="Content with WYSIWYG-compatible HTML"></textarea>
        <select class="field" wire:model="status"><option value="draft">Draft</option><option value="published">Published</option></select>
        <button class="btn-primary">Save</button>
    </form>
    <div class="rounded-lg bg-white p-5 shadow-sm">
        @foreach($posts as $post)
            <div class="flex justify-between border-b py-3"><span>{{ $post->title }} · {{ $post->status }}</span><div><button class="font-bold text-red-600" wire:click="edit({{ $post->id }})">Edit</button><button class="ml-3 font-bold text-gray-500" wire:click="delete({{ $post->id }})">Delete</button></div></div>
        @endforeach
    </div>
</div>
