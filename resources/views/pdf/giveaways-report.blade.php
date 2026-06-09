<!doctype html>
<html>
<head><meta charset="utf-8"><style>body{font-family:Arial,sans-serif}.header{background:#f97316;color:#fff;padding:18px}.card{border:1px solid #ddd;margin:12px 0;padding:12px;border-radius:6px}.status{font-weight:bold;color:#ef4444}</style></head>
<body>
    <div class="header"><h1>FITSTORE Giveaways Report</h1></div>
    @foreach($giveaways as $giveaway)
        <div class="card">
            <h2>{{ $giveaway->title }}</h2>
            <p class="status">{{ $giveaway->status }} · {{ $giveaway->entries_count }} entries</p>
            <p>Prize: {{ $giveaway->prize }}</p>
            <p>Winner: {{ $giveaway->winner?->name ?? 'No winner yet' }}</p>
        </div>
    @endforeach
</body>
</html>
