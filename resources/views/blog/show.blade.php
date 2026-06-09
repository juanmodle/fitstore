@extends('layouts.app')

@section('content')
<article class="mx-auto max-w-3xl px-4 py-10">
    <img class="mb-6 aspect-video w-full rounded-lg object-cover" src="{{ $post->image }}" alt="{{ $post->translatedTitle() }}">
    <p class="text-sm font-bold text-red-600">{{ $post->category?->name }}</p>
    <h1 class="mt-2 text-4xl font-black">{{ $post->translatedTitle() }}</h1>
    <div class="prose mt-6 max-w-none">{!! $post->translatedContent() !!}</div>
    <section class="mt-10 rounded-lg bg-white p-5 shadow-sm">
        <h2 class="font-black">{{ __('messages.comments') }}</h2>
        @foreach($post->comments->where('status', 'approved') as $comment)
            <div class="mt-4 border-t pt-4"><p class="text-sm font-bold">{{ $comment->user?->name }}</p><p class="text-sm text-gray-600">{{ $comment->content }}</p></div>
        @endforeach
        @auth
            <form class="mt-5 grid gap-3" method="post" action="{{ route('blog.comments.store', $post) }}">
                @csrf
                <textarea class="field" name="content" rows="3" placeholder="{{ __('messages.write_comment') }}"></textarea>
                <button class="btn-primary">{{ __('messages.send_comment') }}</button>
            </form>
        @endauth
    </section>
</article>
@endsection
