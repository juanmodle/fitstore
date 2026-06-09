@extends('layouts.app')

@section('content')
<section class="mx-auto grid max-w-7xl gap-8 px-4 py-10 lg:grid-cols-2">
    <div x-data="{image:'{{ optional($product->mainImage)->image_path ?: optional($product->images->first())->image_path }}'}">
        <img class="aspect-square w-full rounded-lg bg-white object-cover shadow-sm" :src="image" alt="{{ $product->translatedName() }}">
        <div class="mt-3 grid grid-cols-4 gap-3">
            @foreach($product->images as $image)
                <button class="overflow-hidden rounded-md border border-gray-200" @click="image='{{ $image->image_path }}'">
                    <img class="aspect-square w-full object-cover" src="{{ $image->image_path }}" alt="{{ $image->alt_text }}">
                </button>
            @endforeach
        </div>
    </div>

    <div>
        <p class="text-sm font-bold uppercase text-red-600">{{ $product->category?->translatedName() }} / {{ $product->brand?->name }}</p>
        <h1 class="mt-2 text-4xl font-black">{{ $product->translatedName() }}</h1>

        <div class="mt-4 flex items-center gap-3">
            @if($product->sale_price)
                <span class="text-lg text-gray-400 line-through">{{ number_format($product->price, 2) }} EUR</span>
                <span class="text-3xl font-black text-red-600">{{ number_format($product->sale_price, 2) }} EUR</span>
            @else
                <span class="text-3xl font-black">{{ number_format($product->price, 2) }} EUR</span>
            @endif
        </div>

        <p class="mt-3 text-sm font-semibold {{ $product->stock > 0 ? 'text-green-700' : 'text-red-700' }}">{{ $product->stock }} {{ __('messages.units_in_stock') }}</p>

        @auth
            @if(auth()->user()->isVipCustomer())
                <p class="mt-4 rounded-md bg-orange-50 px-4 py-3 text-sm font-semibold text-orange-800">{{ __('messages.vip_customer_message') }}</p>
            @else
                <p class="mt-4 rounded-md bg-gray-100 px-4 py-3 text-sm font-semibold text-gray-700">{{ __('messages.become_vip_message') }}</p>
            @endif
        @endauth

        <form class="mt-6 grid gap-4" method="post" action="{{ route('cart.items.store') }}">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">

            @if($product->variants->isNotEmpty())
                <label class="grid gap-2 text-sm font-bold">{{ __('messages.variant') }}
                    <select class="field" name="product_variant_id">
                        @foreach($product->variants as $variant)
                            <option value="{{ $variant->id }}">{{ trim($variant->size.' '.$variant->color.' '.$variant->flavor.' '.$variant->weight) }} (+{{ number_format($variant->extra_price, 2) }} EUR)</option>
                        @endforeach
                    </select>
                </label>
            @endif

            <label class="grid gap-2 text-sm font-bold">{{ __('messages.quantity') }}
                <input class="field max-w-32" type="number" name="quantity" min="1" value="1">
            </label>

            @auth
                <button class="btn-primary max-w-xs">{{ __('messages.add_to_cart') }}</button>
            @else
                <a class="btn-primary max-w-xs" href="{{ route('login') }}">{{ __('messages.login_to_buy') }}</a>
            @endauth
        </form>

        <div class="prose mt-8 max-w-none">{!! $product->translatedDescription() !!}</div>

        <div class="mt-6 flex flex-wrap gap-2">
            @foreach($product->tags as $tag)
                <span class="badge bg-gray-200 text-gray-700">{{ $tag->name }}</span>
            @endforeach
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-10">
    <h2 class="mb-5 text-2xl font-black">{{ __('messages.related_products') }}</h2>
    <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
        @foreach($relatedProducts as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>
</section>
@endsection
