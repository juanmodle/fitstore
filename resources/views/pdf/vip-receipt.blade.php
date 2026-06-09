<!doctype html>
<html>
<head><meta charset="utf-8"><style>body{font-family:DejaVu Sans,sans-serif;font-size:12px}</style></head>
<body>
    <h1>VIP subscription receipt</h1>
    <p>Customer: {{ $subscription->user->name }}</p>
    <p>Start date: {{ $subscription->start_date->format('d/m/Y') }}</p>
    <p>End date: {{ $subscription->end_date?->format('d/m/Y') }}</p>
    <p>Payment method: {{ $subscription->paymentMethod?->name }}</p>
    <h2>Monthly price: {{ number_format($subscription->monthly_price, 2) }} EUR</h2>
</body>
</html>
