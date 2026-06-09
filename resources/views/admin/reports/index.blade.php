@extends('layouts.admin')

@section('content')
<h1 class="mb-6 text-3xl font-black">Reports</h1>
<div class="grid gap-5 md:grid-cols-4">
    <a class="rounded-lg bg-white p-5 font-black shadow-sm transition hover:shadow-lg" href="{{ route('admin.reports.sales-pdf') }}?download=1">Complex sales PDF</a>
    <a class="rounded-lg bg-white p-5 font-black shadow-sm transition hover:shadow-lg" href="{{ route('admin.reports.products-pdf') }}?download=1">Products PDF</a>
    <a class="rounded-lg bg-white p-5 font-black shadow-sm transition hover:shadow-lg" href="{{ route('admin.reports.vip-pdf') }}?download=1">VIP PDF</a>
    <a class="rounded-lg bg-white p-5 font-black shadow-sm transition hover:shadow-lg" href="{{ route('admin.reports.giveaways-pdf') }}?download=1">Giveaways PDF</a>
</div>
<form class="mt-8 grid gap-4 rounded-lg bg-white p-5 shadow-sm md:grid-cols-3">
    <x-form.date name="from" label="From date" />
    <x-form.date name="to" label="To date" />
    <x-form.select name="report_type" label="Report type" :options="['sales' => 'Sales', 'products' => 'Products', 'vip' => 'VIP']" />
</form>
@endsection
