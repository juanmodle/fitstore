<!doctype html>
<html>
<head><meta charset="utf-8"><style>body{font-family:Arial,sans-serif;color:#111827}.header{background:#111827;color:#fff;padding:20px}.table{width:100%;border-collapse:collapse;margin-top:20px}.table th,.table td{border-bottom:1px solid #ddd;padding:10px;text-align:left}.total{text-align:right;font-size:22px;font-weight:bold;margin-top:20px}</style></head>
<body>
    <div class="header"><h1>FITSTORE Invoice</h1><p>{{ $order->order_number }}</p></div>
    <p><strong>Customer:</strong> {{ $order->user->name }} · {{ $order->user->email }}</p>
    <table class="table">
        <thead><tr><th>Product</th><th>Qty</th><th>Unit</th><th>Total</th></tr></thead>
        <tbody>@foreach($order->items as $item)<tr><td>{{ $item->product_name }}</td><td>{{ $item->quantity }}</td><td>{{ number_format($item->unit_price, 2) }} €</td><td>{{ number_format($item->total_price, 2) }} €</td></tr>@endforeach</tbody>
    </table>
    <p class="total">Total: {{ number_format($order->total_price, 2) }} €</p>
</body>
</html>
