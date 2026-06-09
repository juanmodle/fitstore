@extends('layouts.admin')

@section('content')
<h1 class="mb-6 text-3xl font-black">{{ $title }}</h1>
<form class="grid gap-5 rounded-lg bg-white p-6 shadow-sm" method="post" action="{{ $model->exists ? route('admin.'.$route.'.update', $model) : route('admin.'.$route.'.store') }}">
    @csrf
    @if($model->exists) @method('patch') @endif
    <div class="grid gap-5 md:grid-cols-2">
        @foreach($fields as $field)
            @php($value = old($field, $model->{$field} ?? ''))
            @if(isset($options[$field]))
                <label class="grid gap-2 text-sm font-bold">{{ str_replace('_', ' ', ucfirst($field)) }}
                    <select class="field" name="{{ $field }}">
                        <option value="">Select option</option>
                        @foreach($options[$field] as $id => $label)
                            <option value="{{ $id }}" @selected((string)$value === (string)$id)>{{ $label }}</option>
                        @endforeach
                    </select>
                </label>
            @elseif(in_array($field, ['description', 'content', 'excerpt']))
                <label class="grid gap-2 text-sm font-bold md:col-span-2">{{ str_replace('_', ' ', ucfirst($field)) }}
                    <input id="{{ $field }}" type="hidden" name="{{ $field }}" value="{{ $value }}"><trix-editor input="{{ $field }}" class="trix-content rounded-md border border-gray-300 bg-white p-3"></trix-editor>
                </label>
            @elseif(str_starts_with($field, 'is_'))
                <label class="flex items-center gap-2 text-sm font-bold">
                    <input type="hidden" name="{{ $field }}" value="0">
                    <input type="checkbox" name="{{ $field }}" value="1" @checked((bool)$value)> {{ str_replace('_', ' ', ucfirst($field)) }}
                </label>
            @elseif($field === 'status')
                <label class="grid gap-2 text-sm font-bold">Status
                    <select class="field" name="status">
                        @foreach(['active', 'inactive', 'draft', 'published', 'finished'] as $status)
                            <option value="{{ $status }}" @selected($value === $status)>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                </label>
            @else
                <label class="grid gap-2 text-sm font-bold">{{ str_replace('_', ' ', ucfirst($field)) }}
                    <input class="field" name="{{ $field }}" value="{{ $value }}">
                </label>
            @endif
        @endforeach
    </div>
    @if($route === 'documents')
        <div class="rounded-lg border-2 border-dashed border-gray-300 p-6 text-center text-sm font-bold text-gray-500">Dropzone upload area prepared for PDF and media files.</div>
    @endif
    <div><button class="btn-primary">Save</button></div>
</form>
@endsection
