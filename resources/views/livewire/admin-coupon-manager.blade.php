<div class="grid gap-6 lg:grid-cols-[380px_1fr]">
    <form wire:submit="save" class="grid gap-4 rounded-lg bg-white p-5 shadow-sm">
        <h2 class="font-black">{{ $couponId ? 'Edit coupon' : 'Create coupon' }}</h2>
        <input class="field" wire:model="code" placeholder="Code">
        <textarea class="field" wire:model="description" placeholder="Description"></textarea>
        <input class="field" type="number" step="0.01" wire:model="percentage" placeholder="Percentage">
        <input class="field" type="number" step="0.01" wire:model="fixedAmount" placeholder="Fixed amount">
        <input class="field" type="number" wire:model="usageLimit" placeholder="Usage limit">
        <label class="flex items-center gap-2 text-sm font-bold"><input type="checkbox" wire:model="isVipOnly"> VIP only</label>
        <select class="field" wire:model="status"><option value="active">Active</option><option value="inactive">Inactive</option></select>
        <button class="btn-primary">Save</button>
    </form>
    <div class="rounded-lg bg-white p-5 shadow-sm">
        @foreach($coupons as $coupon)
            <div class="flex justify-between border-b py-3"><span>{{ $coupon->code }} · {{ $coupon->is_vip_only ? 'VIP' : 'Public' }}</span><div><button class="font-bold text-red-600" wire:click="edit({{ $coupon->id }})">Edit</button><button class="ml-3 font-bold text-gray-500" wire:click="delete({{ $coupon->id }})">Delete</button></div></div>
        @endforeach
    </div>
</div>
