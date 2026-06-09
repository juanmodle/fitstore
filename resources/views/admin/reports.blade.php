@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div>
            <p class="eyebrow">Admin</p>
            <h1 class="page-title">Reports</h1>
        </div>
    </div>
    <div class="grid gap-4 md:grid-cols-2">
        <a href="{{ route('admin.pdf.monthly-sales-report') }}" class="action-card font-bold">Monthly sales PDF</a>
        <form method="POST" action="{{ route('admin.reports.sales-summary') }}" class="action-card">
            @csrf
            <button class="font-bold" type="submit">Generate sales summary command</button>
        </form>
    </div>
@endsection
