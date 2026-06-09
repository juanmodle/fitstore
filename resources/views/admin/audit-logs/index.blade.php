@extends('layouts.admin')

@section('content')
<h1 class="mb-6 text-3xl font-black">Audit logs</h1>
<div class="rounded-lg bg-white shadow-sm">
    @foreach($logs as $log)
        <div class="border-b p-4">
            <p class="font-bold">{{ $log->action }} · {{ $log->table_name }} #{{ $log->record_id }}</p>
            <p class="text-sm text-gray-500">{{ $log->user?->name }} · {{ $log->created_at?->format('d/m/Y H:i') }}</p>
            <pre class="mt-2 overflow-auto rounded-md bg-gray-100 p-3 text-xs">{{ json_encode($log->new_values, JSON_PRETTY_PRINT) }}</pre>
        </div>
    @endforeach
</div>
<div class="mt-6">{{ $logs->links() }}</div>
@endsection
