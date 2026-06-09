@extends('layouts.app')

@section('content')
    <section class="hero">
        <div>
            <p class="eyebrow">Fitness shop</p>
            <h1 class="page-title">Supplements, fit food and training gear</h1>
            <p class="lead">A simple Laravel store project with catalog, cart, VIP subscriptions, blog, payments and admin area.</p>
            <div class="mt-6 flex flex-wrap gap-3">
                <a href="{{ route('catalog.index') }}" class="btn btn-primary">View catalog</a>
                <a href="{{ route('vip.info') }}" class="btn btn-secondary">VIP info</a>
            </div>
        </div>
        <div class="hero-board" aria-label="Store sections">
            <div class="hero-tile"><span class="badge">01</span><strong>Protein</strong><p class="muted">Whey, bars and recovery.</p></div>
            <div class="hero-tile"><span class="badge">02</span><strong>Creatine</strong><p class="muted">Powder, capsules and mixes.</p></div>
            <div class="hero-tile"><span class="badge">03</span><strong>Clothing</strong><p class="muted">Men and women training wear.</p></div>
            <div class="hero-tile"><span class="badge">04</span><strong>Accessories</strong><p class="muted">Belts, straps and shakers.</p></div>
        </div>
    </section>

    <section class="mt-10">
        <div class="page-header">
            <h2 class="section-title">Featured products</h2>
            <a href="{{ route('catalog.index') }}" class="btn btn-secondary btn-small">All products</a>
        </div>
        <div class="grid-cards">
            @foreach ($featuredProducts as $product)
                <article class="product-card">
                    <div class="product-media">{{ str($product->category->name)->substr(0, 2)->upper() }}</div>
                    <p class="product-meta">{{ $product->category->name }}</p>
                    <h3 class="mt-1 font-bold">{{ $product->name }}</h3>
                    <p class="price mt-3">{{ number_format($product->finalPrice(), 2) }} EUR</p>
                    <a href="{{ route('products.show', $product) }}" class="btn btn-secondary btn-small mt-4">View product</a>
                </article>
            @endforeach
        </div>
    </section>

    <section class="mt-10">
        <h2 class="section-title mb-4">Latest news</h2>
        <div class="grid-cards">
            @foreach ($latestPosts as $post)
                <article class="post-card">
                    <h3 class="font-bold">{{ $post->title }}</h3>
                    <p class="muted mt-2">{{ str(strip_tags($post->content))->limit(90) }}</p>
                    <a href="{{ route('blog.show', $post) }}" class="btn btn-secondary btn-small mt-4">Read more</a>
                </article>
            @endforeach
        </div>
    </section>
@endsection
