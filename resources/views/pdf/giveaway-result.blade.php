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
    <h1>Giveaway result report</h1>
    <p>Giveaway: {{ $giveaway->title }}</p>
    <p>Prize: {{ $giveaway->prize }}</p>
    <p>Winner: {{ $giveaway->winner?->name ?? 'No winner yet' }}</p>
    <table>
        <thead><tr><th>User</th><th>Email</th><th>Joined</th></tr></thead>
        <tbody>
            @foreach ($giveaway->entries as $entry)
                <tr><td>{{ $entry->user->name }}</td><td>{{ $entry->user->email }}</td><td>{{ $entry->joined_at->format('d/m/Y H:i') }}</td></tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
