@extends('layouts.app')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-10">
    <h1 class="mb-6 text-3xl font-black">{{ __('messages.fitstore_blog') }}</h1>
    <div class="grid gap-5 md:grid-cols-3">
        @foreach($posts as $post)
            <a class="rounded-lg bg-white p-5 shadow-sm" href="{{ route('blog.show', $post) }}">
                <img class="mb-4 h-44 w-full rounded-md object-cover" src="{{ $post->image }}" alt="{{ $post->translatedTitle() }}">
                <p class="text-xs font-bold uppercase text-red-600">{{ $post->category?->name }}</p>
                <h2 class="mt-2 font-black">{{ $post->translatedTitle() }}</h2>
                <p class="mt-2 text-sm text-gray-500">{{ $post->translatedExcerpt() }}</p>
            </a>
        @endforeach
    </div>
    <div class="mt-8">{{ $posts->links() }}</div>
</section>
@endsection
