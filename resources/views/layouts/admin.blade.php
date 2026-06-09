<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'FITSTORE Admin' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5/dist/min/dropzone.min.css">
    <link rel="stylesheet" href="https://unpkg.com/trix@2.1.13/dist/trix.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen md:flex">
        <aside class="bg-gray-950 text-white md:min-h-screen md:w-64">
            <div class="border-b border-white/10 p-5 text-xl font-black">FITSTORE Admin</div>
            <nav class="grid gap-1 p-4 text-sm font-semibold">
                <a class="rounded-md px-3 py-2 hover:bg-white/10" href="{{ route('admin.dashboard') }}">Dashboard</a>
                <a class="rounded-md px-3 py-2 hover:bg-white/10" href="{{ route('admin.products.index') }}">Products</a>
                <a class="rounded-md px-3 py-2 hover:bg-white/10" href="{{ route('admin.categories.index') }}">Categories</a>
                <a class="rounded-md px-3 py-2 hover:bg-white/10" href="{{ route('admin.brands.index') }}">Brands</a>
                <a class="rounded-md px-3 py-2 hover:bg-white/10" href="{{ route('admin.orders.index') }}">Orders</a>
                <a class="rounded-md px-3 py-2 hover:bg-white/10" href="{{ route('admin.users.index') }}">Users</a>
                <a class="rounded-md px-3 py-2 hover:bg-white/10" href="{{ route('admin.coupons.index') }}">Coupons</a>
                <a class="rounded-md px-3 py-2 hover:bg-white/10" href="{{ route('admin.giveaways.index') }}">Giveaways</a>
                <a class="rounded-md px-3 py-2 hover:bg-white/10" href="{{ route('admin.posts.index') }}">Blog</a>
                <a class="rounded-md px-3 py-2 hover:bg-white/10" href="{{ route('admin.documents.index') }}">Documents</a>
                <a class="rounded-md px-3 py-2 hover:bg-white/10" href="{{ route('admin.media-assets.index') }}">Media assets</a>
                <a class="rounded-md px-3 py-2 hover:bg-white/10" href="{{ route('admin.reports.index') }}">Reports</a>
                <a class="rounded-md px-3 py-2 hover:bg-white/10" href="{{ route('home') }}">Public site</a>
            </nav>
        </aside>
        <main class="flex-1 p-4 md:p-8">
            @if(session('success'))
                <div class="mb-4 rounded-md border border-green-200 bg-green-50 px-4 py-3 text-sm font-semibold text-green-800">{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="mb-4 rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-800">{{ $errors->first() }}</div>
            @endif
            @yield('content')
        </main>
    </div>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/dropzone@5/dist/min/dropzone.min.js"></script>
    <script src="https://unpkg.com/trix@2.1.13/dist/trix.umd.min.js"></script>
</body>
</html>
