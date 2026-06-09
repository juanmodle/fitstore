@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <p class="eyebrow">Shop</p>
            <h1 class="page-title">Catalog</h1>
            <p class="lead">Browse supplements, food, clothing and training accessories.</p>
        </div>
    </div>

    <form class="filter-panel">
        <x-input name="search" value="{{ request('search') }}" placeholder="Search products" />
        <x-select name="category">
            <option value="">All categories</option>
            @foreach ($categories as $category)
                <option value="{{ $category->slug }}" @selected(request('category') === $category->slug)>{{ $category->name }}</option>
            @endforeach
        </x-select>
        <x-input name="min_price" value="{{ request('min_price') }}" placeholder="Min price" />
        <button class="btn btn-primary" type="submit">Filter</button>
    </form>

    <div class="grid-cards mt-6">
        @foreach ($products as $product)
            <article class="product-card">
                <div class="product-media">{{ str($product->category->name)->substr(0, 2)->upper() }}</div>
                <div class="flex items-start justify-between gap-3">
                    <p class="product-meta">{{ $product->category->name }}</p>
                    @if ($product->is_vip_exclusive)
                        <span class="badge">VIP</span>
                    @endif
                </div>
                <h2 class="mt-1 text-lg font-bold">{{ $product->name }}</h2>
                <p class="muted mt-1">Stock: {{ $product->stock }}</p>
                <p class="price mt-3">{{ number_format($product->finalPrice(), 2) }} EUR</p>
                <a href="{{ route('products.show', $product) }}" class="btn btn-secondary btn-small mt-4">Details</a>
            </article>
        @endforeach
    </div>
    <div class="mt-6">{{ $products->links() }}</div>
@endsection
