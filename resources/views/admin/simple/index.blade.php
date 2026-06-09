@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-3xl font-black">{{ $title }}</h1>
    <a class="btn-primary" href="{{ route('admin.'.$route.'.create') }}">Create</a>
</div>
<div class="overflow-hidden rounded-lg bg-white shadow-sm">
    <table class="w-full text-left text-sm">
        <thead class="bg-gray-100 text-xs uppercase text-gray-500">
            <tr>@foreach($columns as $column)<th class="p-3">{{ str_replace('_', ' ', $column) }}</th>@endforeach<th></th></tr>
        </thead>
        <tbody>
            @foreach($rows as $row)
                <tr class="border-t">
                    @foreach($columns as $column)
                        <td class="p-3">{{ data_get($row, $column) }}</td>
                    @endforeach
                    <td class="p-3 text-right">
                        <a class="font-bold text-red-600" href="{{ route('admin.'.$route.'.edit', $row) }}">Edit</a>
                        <form class="inline" method="post" action="{{ route('admin.'.$route.'.destroy', $row) }}">@csrf @method('delete')<button class="ml-3 font-bold text-gray-500">Delete</button></form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $rows->links() }}</div>
@endsection
