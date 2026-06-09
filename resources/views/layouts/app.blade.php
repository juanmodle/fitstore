<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'FITSTORE' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">
    @php
        $languageLabels = ['en' => 'EN', 'es' => 'ES'];
        $currentLocale = app()->getLocale();
    @endphp
    <div x-data="{open:false}" class="min-h-screen">
        <header class="sticky top-0 z-40 border-b border-gray-200 bg-white/95 backdrop-blur">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <span class="grid h-9 w-9 place-items-center rounded-md bg-red-600 font-black text-white">FS</span>
                    <span class="text-xl font-black tracking-wide">FITSTORE</span>
                </a>
                <nav class="hidden items-center gap-6 text-sm font-semibold md:flex">
                    <a class="hover:text-red-600" href="{{ route('products.index') }}">{{ __('messages.products') }}</a>
                    <a class="hover:text-red-600" href="{{ route('blog.index') }}">{{ __('messages.blog') }}</a>
                    <a class="hover:text-red-600" href="{{ route('vip.show') }}">{{ __('messages.vip') }}</a>
                    <a class="hover:text-red-600" href="{{ route('contact.show') }}">{{ __('messages.contact') }}</a>
                    @auth
                        <a class="hover:text-red-600" href="{{ route('cart.index') }}">{{ __('messages.cart') }}</a>
                        <a class="hover:text-red-600" href="{{ route('customer.dashboard') }}">{{ __('messages.account') }}</a>
                        @if(auth()->user()->hasPermission('view_reports') || auth()->user()->hasPermission('manage_products'))
                            <a class="rounded-md bg-gray-900 px-3 py-2 text-white hover:bg-red-600" href="{{ route('admin.dashboard') }}">{{ __('messages.admin') }}</a>
                        @endif
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button class="hover:text-red-600">{{ __('messages.logout') }}</button>
                        </form>
                    @else
                        <a class="hover:text-red-600" href="{{ route('login') }}">{{ __('messages.login') }}</a>
                        <a class="btn-primary py-2" href="{{ route('register') }}">{{ __('messages.join') }}</a>
                    @endauth
                <div class="hidden gap-1 md:flex" aria-label="{{ __('messages.language') }}">
                    @foreach($languageLabels as $locale => $label)
                        <a
                            class="rounded border px-2 py-1 text-xs font-bold transition {{ $currentLocale === $locale ? 'border-red-600 bg-red-600 text-white shadow-sm' : 'border-gray-300 bg-white text-gray-900 hover:border-red-600 hover:text-red-600' }}"
                            href="{{ route('language.switch', $locale) }}"
                            @if($currentLocale === $locale) aria-current="true" @endif
                        >{{ $label }}</a>
                    @endforeach
                </div></nav>
                <button class="rounded-md border border-gray-300 px-3 py-2 md:hidden" @click="open=!open">{{ __('messages.menu') }}</button>
            </div>
            <div x-show="open" x-cloak class="border-t bg-white md:hidden">
                <div class="mx-auto grid max-w-7xl gap-2 px-4 py-4 text-sm font-semibold">
                    <a href="{{ route('products.index') }}">{{ __('messages.products') }}</a>
                    <a href="{{ route('blog.index') }}">{{ __('messages.blog') }}</a>
                    <a href="{{ route('vip.show') }}">{{ __('messages.vip') }}</a>
                    <a href="{{ route('contact.show') }}">{{ __('messages.contact') }}</a>
                    @auth
                        <a href="{{ route('cart.index') }}">{{ __('messages.cart') }}</a>
                        <a href="{{ route('customer.dashboard') }}">{{ __('messages.account') }}</a>
                    @else
                        <a href="{{ route('login') }}">{{ __('messages.login') }}</a>
                        <a href="{{ route('register') }}">{{ __('messages.register') }}</a>
                    @endauth
                    <div class="mt-2 flex gap-2" aria-label="{{ __('messages.language') }}">
                        @foreach($languageLabels as $locale => $label)
                            <a
                                class="rounded border px-2 py-1 text-xs font-bold {{ $currentLocale === $locale ? 'border-red-600 bg-red-600 text-white' : 'border-gray-300 bg-white text-gray-900' }}"
                                href="{{ route('language.switch', $locale) }}"
                                @if($currentLocale === $locale) aria-current="true" @endif
                            >{{ $label }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </header>

        @if(session('success'))
            <div class="mx-auto mt-4 max-w-7xl px-4">
                <div class="rounded-md border border-green-200 bg-green-50 px-4 py-3 text-sm font-semibold text-green-800">{{ session('success') }}</div>
            </div>
        @endif
        @if($errors->any())
            <div class="mx-auto mt-4 max-w-7xl px-4">
                <div class="rounded-md border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-800">{{ $errors->first() }}</div>
            </div>
        @endif

        <main>
            {{ $slot ?? '' }}
            @yield('content')
        </main>

        <footer class="mt-16 bg-gray-950 text-white">
            <div class="mx-auto grid max-w-7xl gap-8 px-4 py-10 md:grid-cols-4">
                <div>
                    <p class="text-xl font-black">FITSTORE</p>
                    <p class="mt-3 text-sm text-gray-400">{{ __('messages.footer_description') }}</p>
                </div>
                <div><p class="font-bold">{{ __('messages.shop') }}</p><a class="mt-3 block text-sm text-gray-400" href="{{ route('products.index') }}">{{ __('messages.catalog') }}</a></div>
                <div><p class="font-bold">VIP</p><a class="mt-3 block text-sm text-gray-400" href="{{ route('vip.show') }}">{{ __('messages.subscription') }}</a></div>
                <div><p class="font-bold">{{ __('messages.legal') }}</p><p class="mt-3 text-sm text-gray-400">{{ __('messages.legal_text') }}</p></div>
            </div>
        </footer>
    </div>
    @livewireScripts
</body>
</html>
