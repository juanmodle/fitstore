<div class="grid gap-6 lg:grid-cols-[360px_1fr]">
    <form wire:submit="save" class="grid gap-4 rounded-lg bg-white p-5 shadow-sm">
        <h2 class="font-black">{{ $categoryId ? 'Edit category' : 'Create category' }}</h2>
        <input class="field" wire:model.live="name" placeholder="Name">
        <input class="field" wire:model="slug" placeholder="Slug">
        <textarea class="field" wire:model="description" placeholder="Description"></textarea>
        <select class="field" wire:model="status"><option value="active">Active</option><option value="inactive">Inactive</option></select>
        <button class="btn-primary">Save</button>
    </form>
    <div class="rounded-lg bg-white p-5 shadow-sm">
        @foreach($categories as $category)
            <div class="flex justify-between border-b py-3"><span>{{ $category->name }} · {{ $category->status }}</span><div><button class="font-bold text-red-600" wire:click="edit({{ $category->id }})">Edit</button><button class="ml-3 font-bold text-gray-500" wire:click="delete({{ $category->id }})">Delete</button></div></div>
        @endforeach
    </div>
</div>
