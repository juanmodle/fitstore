<!doctype html>
<html>
<head><meta charset="utf-8"><style>body{font-family:Arial,sans-serif}.header{background:#ef4444;color:#fff;padding:18px}.table{width:100%;border-collapse:collapse}.table th,.table td{border-bottom:1px solid #ddd;padding:8px;text-align:left}</style></head>
<body>
    <div class="header"><h1>FITSTORE Products Report</h1></div>
    <table class="table">
        <thead><tr><th>Product</th><th>Category</th><th>Brand</th><th>Stock</th><th>Price</th></tr></thead>
        <tbody>@foreach($products as $product)<tr><td>{{ $product->name }}</td>
            <td>{{ $product->category?->name }}</td>
            <td>{{ $product->brand?->name }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ number_format($product->price, 2) }} €</td></tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
