@extends('layouts.app')

@section('content')
    <article class="panel panel-pad">
        <p class="product-meta">{{ $post->category?->name }} / {{ $post->published_at?->format('d/m/Y') }}</p>
        <h1 class="mt-2 text-3xl font-black">{{ $post->title }}</h1>
        <div class="prose mt-6 max-w-none text-slate-700">{!! $post->content !!}</div>
    </article>
@endsection
