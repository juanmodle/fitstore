<div>
    <form method="GET" action="{{ route('products.index') }}" class="mb-6 grid gap-3 rounded-lg bg-white p-4 shadow-sm md:grid-cols-6">
        <input name="search" class="field md:col-span-2" type="search" wire:model.live.debounce.300ms="search" placeholder="{{ __('messages.search_products') }}">

        <select name="category" class="field" wire:model.live="category">
            <option value="">{{ __('messages.category') }}</option>
            @foreach($categories as $item)
                <option value="{{ $item->slug }}">{{ $item->translatedName() }}</option>
            @endforeach
        </select>

        <select name="brand" class="field" wire:model.live="brand">
            <option value="">{{ __('messages.brand') }}</option>
            @foreach($brands as $item)
                <option value="{{ $item->slug }}">{{ $item->name }}</option>
            @endforeach
        </select>

        <select name="sort" class="field" wire:model.live="sort">
            <option value="newest">{{ __('messages.newest') }}</option>
            <option value="price_low">{{ __('messages.price_low') }}</option>
            <option value="price_high">{{ __('messages.price_high') }}</option>
            <option value="featured">{{ __('messages.featured') }}</option>
        </select>

        <input name="min_price" class="field" type="number" wire:model.live.debounce.500ms="minPrice" placeholder="{{ __('messages.min_price') }}">
        <input name="max_price" class="field" type="number" wire:model.live.debounce.500ms="maxPrice" placeholder="{{ __('messages.max_price') }}">

        <button class="rounded-md bg-gray-900 px-4 py-3 text-sm font-black text-white hover:bg-red-600" type="submit">{{ __('messages.apply_filters') }}</button>
        <a class="rounded-md border border-gray-300 px-4 py-3 text-center text-sm font-black hover:border-red-600 hover:text-red-600" href="{{ route('products.index') }}">{{ __('messages.clear_filters') }}</a>
    </form>

    <p class="mb-4 text-sm font-bold text-gray-600">{{ __('messages.showing_products', ['count' => $products->total()]) }}</p>

    <div wire:loading class="mb-4 rounded-md bg-orange-50 px-4 py-3 text-sm font-bold text-orange-800">{{ __('messages.loading_products') }}</div>
    @if($products->count())
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($products as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
        <div class="mt-8">{{ $products->links() }}</div>
    @else
        <div class="rounded-lg bg-white p-10 text-center shadow-sm">
            <p class="font-black">{{ __('messages.no_products_found') }}</p>
            <p class="mt-2 text-sm text-gray-500">{{ __('messages.try_another_search') }}</p>
        </div>
    @endif
</div>
