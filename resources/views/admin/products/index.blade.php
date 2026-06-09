@extends('layouts.admin')

@section('content')
<div class="mb-6 flex items-center justify-between">
    <h1 class="text-3xl font-black">Products</h1>
    <a class="btn-primary" href="{{ route('admin.products.create') }}">Create product</a>
</div>
<div class="overflow-hidden rounded-lg bg-white shadow-sm">
    <table class="w-full text-left text-sm">
        <thead class="bg-gray-100 text-xs uppercase text-gray-500"><tr><th class="p-3">Name</th><th>Category</th><th>Brand</th><th>Stock</th><th>Price</th><th></th></tr></thead>
        <tbody>
            @foreach($products as $product)
                <tr class="border-t">
                    <td class="p-3 font-bold">{{ $product->name }}</td>
                    <td>{{ $product->category?->name }}</td>
                    <td>{{ $product->brand?->name }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ number_format($product->price, 2) }} €</td>
                    <td class="p-3 text-right">
                        <a class="font-bold text-red-600" href="{{ route('admin.products.edit', $product) }}">Edit</a>
                        <form class="inline" method="post" action="{{ route('admin.products.destroy', $product) }}">@csrf @method('delete')<button class="ml-3 font-bold text-gray-500">Delete</button></form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $products->links() }}</div>
@endsection
