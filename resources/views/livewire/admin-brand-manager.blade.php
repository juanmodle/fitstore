<div class="grid gap-6 lg:grid-cols-[360px_1fr]">
    <form wire:submit="save" class="grid gap-4 rounded-lg bg-white p-5 shadow-sm">
        <h2 class="font-black">{{ $brandId ? 'Edit brand' : 'Create brand' }}</h2>
        <input class="field" wire:model.live="name" placeholder="Name">
        <input class="field" wire:model="slug" placeholder="Slug">
        <textarea class="field" wire:model="description" placeholder="Description"></textarea>
        <input class="field" wire:model="logo" placeholder="Logo URL">
        <button class="btn-primary">Save</button>
    </form>
    <div class="rounded-lg bg-white p-5 shadow-sm">
        @foreach($brands as $brand)
            <div class="flex justify-between border-b py-3"><span>{{ $brand->name }}</span><div><button class="font-bold text-red-600" wire:click="edit({{ $brand->id }})">Edit</button><button class="ml-3 font-bold text-gray-500" wire:click="delete({{ $brand->id }})">Delete</button></div></div>
        @endforeach
    </div>
</div>
