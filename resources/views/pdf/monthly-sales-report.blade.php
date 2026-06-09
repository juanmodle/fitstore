<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border-bottom: 1px solid #ddd; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Monthly sales report</h1>
    <p>Month: {{ now()->format('F Y') }}</p>
    <table>
        <thead><tr><th>Order</th><th>Status</th><th>Payment</th><th>Total</th></tr></thead>
        <tbody>
            @foreach ($orders as $order)
                <tr><td>{{ $order->order_number }}</td><td>{{ $order->status }}</td><td>{{ $order->payment_status }}</td><td>{{ number_format($order->total_price, 2) }}</td></tr>
            @endforeach
        </tbody>
    </table>
    <h2>Total sales: {{ number_format($total, 2) }} EUR</h2>
</body>
</html>
