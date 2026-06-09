<div class="grid gap-6 lg:grid-cols-[390px_1fr]">
    <form wire:submit="save" class="grid gap-4 rounded-lg bg-white p-5 shadow-sm">
        <h2 class="font-black">{{ $giveawayId ? 'Edit giveaway' : 'Create giveaway' }}</h2>
        <input class="field" wire:model="title" placeholder="Title">
        <textarea class="field" wire:model="description" placeholder="Description"></textarea>
        <input class="field" wire:model="prize" placeholder="Prize">
        <input class="field" type="date" wire:model="startDate">
        <input class="field" type="date" wire:model="endDate">
        <select class="field" wire:model="status"><option value="active">Active</option><option value="finished">Finished</option><option value="draft">Draft</option></select>
        <button class="btn-primary">Save</button>
    </form>
    <div class="rounded-lg bg-white p-5 shadow-sm">
        @foreach($giveaways as $giveaway)
            <div class="flex justify-between border-b py-3"><span>{{ $giveaway->title }} · {{ $giveaway->status }}</span><div><button class="font-bold text-red-600" wire:click="edit({{ $giveaway->id }})">Edit</button><button class="ml-3 font-bold text-gray-500" wire:click="delete({{ $giveaway->id }})">Delete</button></div></div>
        @endforeach
    </div>
</div>
