@extends('layouts.admin')

@section('content')
<h1 class="mb-6 text-3xl font-black">Media assets</h1>
<form action="{{ route('admin.media-assets.store') }}" class="dropzone rounded-lg border-2 border-dashed border-gray-300 bg-white p-8" id="mediaDropzone">
    @csrf
</form>
<div class="mt-8 grid gap-4 md:grid-cols-3">
    @foreach($assets as $asset)
        <div class="rounded-lg bg-white p-4 shadow-sm">
            <p class="font-bold">{{ $asset->alt_text }}</p>
            <p class="text-sm text-gray-500">{{ $asset->file_type }} · {{ $asset->file_size }} bytes</p>
        </div>
    @endforeach
</div>
@endsection
