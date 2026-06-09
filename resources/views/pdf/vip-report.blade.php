<!doctype html>
<html>
<head><meta charset="utf-8"><style>body{font-family:Arial,sans-serif}.header{background:#111827;color:#fff;padding:18px}.table{width:100%;border-collapse:collapse}.table th,.table td{border-bottom:1px solid #ddd;padding:8px;text-align:left}.vip{color:#ef4444;font-weight:bold}</style></head>
<body>
    <div class="header"><h1>FITSTORE VIP Subscriptions Report</h1></div>
    <table class="table">
        <thead><tr><th>Customer</th><th>Status</th><th>Start</th><th>End</th><th>Payments</th></tr></thead>
        <tbody>@foreach($subscriptions as $subscription)<tr><td class="vip">{{ $subscription->user?->name }}</td><td>{{ $subscription->status }}</td><td>{{ $subscription->start_date?->format('d/m/Y') }}</td><td>{{ $subscription->end_date?->format('d/m/Y') }}</td><td>{{ $subscription->payments->count() }}</td></tr>@endforeach</tbody>
    </table>
</body>
</html>
