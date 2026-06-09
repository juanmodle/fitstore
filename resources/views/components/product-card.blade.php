@props(['product'])
<article class="group overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
    <a href="{{ route('products.show', $product) }}">
        <img class="aspect-square w-full object-cover" src="{{ optional($product->mainImage)->image_path ?: 'https://placehold.co/900x900?text=FITSTORE' }}" alt="{{ $product->translatedName() }}">
    </a>
    <div class="p-4">
        <div class="flex items-center justify-between gap-3">
            <p class="text-xs font-bold uppercase text-red-600">{{ $product->category?->translatedName() }}</p>
            @if($product->is_featured)<span class="badge bg-orange-100 text-orange-700">{{ __('messages.featured') }}</span>@endif
        </div>
        <a href="{{ route('products.show', $product) }}" class="mt-2 block font-black leading-tight hover:text-red-600">{{ $product->translatedName() }}</a>
        <p class="mt-1 text-sm text-gray-500">{{ $product->brand?->name }}</p>
        <div class="mt-4 flex items-end justify-between">
            <div>
                @if($product->sale_price)
                    <p class="text-xs text-gray-400 line-through">{{ number_format($product->price, 2) }} €</p>
                    <p class="text-lg font-black text-red-600">{{ number_format($product->sale_price, 2) }} €</p>
                @else
                    <p class="text-lg font-black">{{ number_format($product->price, 2) }} €</p>
                @endif
            </div>
            <span class="rounded-md bg-gray-100 px-2 py-1 text-xs font-bold text-gray-700">{{ $product->stock }} {{ __('messages.left') }}</span>
        </div>
    </div>
</article>
