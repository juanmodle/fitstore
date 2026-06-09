<!doctype html>
<html>
<head><meta charset="utf-8"><style>body{font-family:DejaVu Sans,sans-serif;font-size:12px}</style></head>
<body>
    <h1>Payment receipt</h1>
    <p>Customer: {{ $payment->user->name }}</p>
    <p>Method: {{ $payment->method->name }}</p>
    <p>Status: {{ $payment->status }}</p>
    <p>Transaction: {{ $payment->transaction_id }}</p>
    <h2>Total: {{ number_format($payment->amount, 2) }} EUR</h2>
</body>
</html>
