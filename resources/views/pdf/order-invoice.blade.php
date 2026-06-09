<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #111827; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border-bottom: 1px solid #ddd; padding: 8px; text-align: left; }
        .total { font-size: 16px; font-weight: bold; text-align: right; }
    </style>
</head>
<body>
    <h1>Order invoice</h1>
    <p>Order: {{ $order->order_number }}</p>
    <p>Customer: {{ $order->user->name }} / {{ $order->user->email }}</p>
    <p>Shipping address: {{ $order->shipping_address }}</p>
    <table>
        <thead><tr><th>Product</th><th>Quantity</th><th>Unit</th><th>Total</th></tr></thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr><td>{{ $item->product_name }}</td><td>{{ $item->quantity }}</td><td>{{ number_format($item->unit_price, 2) }}</td><td>{{ number_format($item->total_price, 2) }}</td></tr>
            @endforeach
        </tbody>
    </table>
    <p class="total">Total: {{ number_format($order->total_price, 2) }} EUR</p>
</body>
</html>
