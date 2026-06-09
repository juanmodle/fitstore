<form wire:submit="save" class="grid gap-5 rounded-lg bg-white p-6 shadow-sm">
    <div class="grid gap-5 md:grid-cols-2">
        <label class="grid gap-2 text-sm font-bold">Name<input class="field" wire:model.live="name"></label>
        <label class="grid gap-2 text-sm font-bold">Slug<input class="field" wire:model="slug"></label>
        <label class="grid gap-2 text-sm font-bold">Price<input class="field" type="number" step="0.01" wire:model="price"></label>
        <label class="grid gap-2 text-sm font-bold">Sale price<input class="field" type="number" step="0.01" wire:model="salePrice"></label>
        <label class="grid gap-2 text-sm font-bold">Stock<input class="field" type="number" wire:model="stock"></label>
        <label class="grid gap-2 text-sm font-bold">Status
            <select class="field" wire:model="status"><option value="active">Active</option><option value="inactive">Inactive</option><option value="draft">Draft</option></select>
        </label>
        <label class="grid gap-2 text-sm font-bold">Category
            <select class="field" wire:model="categoryId"><option value="">No category</option>@foreach($categories as $category)<option value="{{ $category->id }}">{{ $category->name }}</option>@endforeach</select>
        </label>
        <label class="grid gap-2 text-sm font-bold">Brand
            <select class="field" wire:model="brandId"><option value="">No brand</option>@foreach($brands as $brand)<option value="{{ $brand->id }}">{{ $brand->name }}</option>@endforeach</select>
        </label>
        <label class="flex items-center gap-2 text-sm font-bold"><input type="checkbox" wire:model="isFeatured"> Featured product</label>
        <label class="grid gap-2 text-sm font-bold md:col-span-2">Main image URL<input class="field" wire:model="imagePath" placeholder="https://placehold.co/900x900"></label>
    </div>
    <label class="grid gap-2 text-sm font-bold">Description
        <textarea class="field" rows="7" wire:model="description" data-wysiwyg></textarea>
    </label>
    <div class="rounded-lg border-2 border-dashed border-gray-300 p-6 text-center text-sm font-bold text-gray-500">
        Dropzone-style media area: paste an image URL above or connect storage later.
    </div>
    <div><button class="btn-primary">Save product</button></div>
</form>
