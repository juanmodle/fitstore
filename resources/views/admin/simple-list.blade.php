@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <p class="eyebrow">Admin</p>
            <h1 class="page-title">{{ $title }}</h1>
        </div>
    </div>
    <div class="panel panel-pad overflow-x-auto">
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><strong>{{ $item->name ?? $item->title ?? $item->email ?? $item->order_number ?? $item->code ?? 'Record' }}</strong></td>
                        <td><span class="badge">{{ $item->status ?? $item->payment_status ?? '-' }}</span></td>
                        <td>{{ $item->created_at?->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">{{ $items->links() }}</div>
    </div>
@endsection
