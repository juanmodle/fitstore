<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body{font-family:Arial,sans-serif;color:#111827}.header{background:#111827;color:#fff;padding:24px}.grid{display:flex;gap:10px;margin:18px 0}.card{flex:1;background:#f3f4f6;padding:14px;border-radius:6px}.card strong{font-size:22px}.table{width:100%;border-collapse:collapse;margin-top:20px}.table th{background:#ef4444;color:#fff}.table th,.table td{padding:9px;border-bottom:1px solid #ddd;text-align:left}.bar{height:12px;background:#ef4444;margin-top:4px}
    </style>
</head>
<body>
    <div class="header"><h1>FITSTORE Sales Report</h1><p>{{ now()->format('d/m/Y H:i') }}</p></div>
    <div class="grid">
        <div class="card"><span>Total sales</span><br><strong>{{ number_format($totalSales, 2) }} €</strong></div>
        <div class="card"><span>Orders</span><br><strong>{{ $orders->count() }}</strong></div>
        <div class="card"><span>VIP customers</span><br><strong>{{ $vipCustomers }}</strong></div>
    </div>
    <h2>Latest orders</h2>
    <table class="table">
        <thead><tr><th>Order</th><th>Customer</th><th>Status</th><th>Total</th></tr></thead>
        <tbody>@foreach($orders as $order)<tr><td>{{ $order->order_number }}</td><td>{{ $order->user?->name }}</td><td>{{ $order->status }}</td><td>{{ number_format($order->total_price, 2) }} €</td></tr>@endforeach</tbody>
    </table>
    <h2>Low stock products</h2>
    @foreach($lowStockProducts as $product)
        <p>{{ $product->name }} - {{ $product->stock }} units</p>
        <div class="bar" style="width: {{ max(5, $product->stock * 8) }}px"></div>
    @endforeach
</body>
</html>
