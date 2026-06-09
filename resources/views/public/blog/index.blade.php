@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <p class="eyebrow">News</p>
            <h1 class="page-title">Blog and news</h1>
            <p class="lead">Fitness tips, new products, nutrition guides and VIP announcements.</p>
        </div>
    </div>
    <div class="grid-cards">
        @foreach ($posts as $post)
            <article class="post-card">
                <p class="product-meta">{{ $post->category?->name }}</p>
                <h2 class="mt-1 text-lg font-bold">{{ $post->title }}</h2>
                <p class="muted mt-2">{{ str(strip_tags($post->content))->limit(120) }}</p>
                <a href="{{ route('blog.show', $post) }}" class="btn btn-secondary btn-small mt-4">Read post</a>
            </article>
        @endforeach
    </div>
    <div class="mt-6">{{ $posts->links() }}</div>
@endsection
