@extends('layouts.app')

@section('content')
<section class="fit-gradient text-white">
    <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 py-16 md:grid-cols-2">
        <div>
            <p class="text-sm font-black uppercase text-orange-400">{{ __('messages.hero_eyebrow') }}</p>
            <h1 class="mt-3 text-4xl font-black leading-tight md:text-6xl">{{ __('messages.hero_title') }}</h1>
            <p class="mt-5 max-w-xl text-lg text-gray-300">{{ __('messages.hero_text') }}</p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a class="btn-primary" href="{{ route('products.index') }}">{{ __('messages.shop_products') }}</a>
                <a class="btn-secondary border-white/20 bg-white/10 text-white hover:bg-white hover:text-gray-950" href="{{ route('vip.show') }}">{{ __('messages.see_vip') }}</a>
            </div>
        </div>

        <div class="overflow-hidden rounded-lg border border-white/10 bg-white/5 p-3 shadow-2xl">
            <img class="aspect-[4/3] w-full rounded-md object-cover" src="{{ asset('images/home/hero.jpg') }}" alt="FITSTORE products">
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-12">
    <div class="mb-6 flex items-end justify-between">
        <div>
            <p class="text-sm font-bold text-red-600">{{ __('messages.catalog_eyebrow') }}</p>
            <h2 class="text-2xl font-black">{{ __('messages.main_categories') }}</h2>
        </div>
        <a class="text-sm font-bold text-red-600" href="{{ route('products.index') }}">{{ __('messages.view_all') }}</a>
    </div>

    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        @foreach($categories as $category)
            <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="overflow-hidden rounded-lg bg-white shadow-sm transition hover:shadow-lg">
                <img class="h-36 w-full object-cover" src="{{ $category->image }}" alt="{{ $category->translatedName() }}">
                <div class="p-4 font-black">{{ $category->translatedName() }}</div>
            </a>
        @endforeach
    </div>
</section>

<section class="bg-white py-12">
    <div class="mx-auto max-w-7xl px-4">
        <div class="mb-6">
            <p class="text-sm font-bold text-red-600">{{ __('messages.featured_eyebrow') }}</p>
            <h2 class="text-2xl font-black">{{ __('messages.popular_products') }}</h2>
        </div>

        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach($featuredProducts as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-12">
    <div class="grid gap-6 lg:grid-cols-3">
        <div class="rounded-lg bg-gray-950 p-8 text-white lg:col-span-2">
            <p class="text-sm font-black text-orange-400">{{ __('messages.vip_subscription') }}</p>
            <h2 class="mt-2 text-3xl font-black">{{ __('messages.save_more_every_month') }}</h2>
            <p class="mt-3 text-gray-300">{{ __('messages.vip_text') }}</p>
            <a class="btn-primary mt-6" href="{{ route('vip.show') }}">{{ __('messages.become_vip') }}</a>
        </div>

        <div class="rounded-lg bg-white p-6 shadow-sm">
            <h3 class="font-black">{{ __('messages.active_offers') }}</h3>
            <div class="mt-4 grid gap-3">
                @foreach($offers as $offer)
                    <div class="rounded-md border border-gray-200 p-3">
                        <p class="font-bold">{{ $offer->name }}</p>
                        <p class="text-sm text-gray-500">{{ $offer->is_vip_only ? __('messages.vip_only') : __('messages.public_discount') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-12">
    <div class="mx-auto max-w-7xl px-4">
        <div class="mb-6">
            <p class="text-sm font-bold text-red-600">{{ __('messages.best_sellers') }}</p>
            <h2 class="text-2xl font-black">{{ __('messages.stocked_ready') }}</h2>
        </div>

        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($bestSellers as $product)
                <x-product-card :product="$product" />
            @endforeach
        </div>
    </div>
</section>

<section class="mx-auto max-w-7xl px-4 py-12">
    <div class="mb-6">
        <p class="text-sm font-bold text-red-600">{{ __('messages.news') }}</p>
        <h2 class="text-2xl font-black">{{ __('messages.latest_blog_posts') }}</h2>
    </div>

    <div class="grid gap-5 md:grid-cols-3">
        @foreach($posts as $post)
            <a href="{{ route('blog.show', $post) }}" class="rounded-lg bg-white p-5 shadow-sm transition hover:shadow-lg">
                <img class="mb-4 h-40 w-full rounded-md object-cover" src="{{ $post->image }}" alt="{{ $post->translatedTitle() }}">
                <p class="text-xs font-bold uppercase text-red-600">{{ $post->category?->name }}</p>
                <h3 class="mt-2 font-black">{{ $post->translatedTitle() }}</h3>
                <p class="mt-2 text-sm text-gray-500">{{ $post->translatedExcerpt() }}</p>
            </a>
        @endforeach
    </div>
</section>
@endsection
