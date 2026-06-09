<div class="grid gap-6 lg:grid-cols-[1fr_320px]">
    <div class="rounded-lg bg-white shadow-sm">
        @if($notice)<div class="border-b px-4 py-3 text-sm font-bold text-red-600">{{ $notice }}</div>@endif
        @forelse($cart->items as $item)
            <div class="grid gap-4 border-b p-4 md:grid-cols-[90px_1fr_auto]">
                <img class="h-24 w-24 rounded-md object-cover" src="{{ optional($item->product->mainImage)->image_path }}" alt="{{ $item->product->translatedName() }}">
                <div>
                    <p class="font-black">{{ $item->product->translatedName() }}</p>
                    <p class="text-sm text-gray-500">{{ trim(optional($item->variant)->size.' '.optional($item->variant)->color.' '.optional($item->variant)->flavor.' '.optional($item->variant)->weight) }}</p>
                    <p class="mt-2 text-sm font-bold">{{ number_format($item->unit_price, 2) }} €</p>
                </div>
                <div class="flex items-center gap-2">
                    <input class="field w-20" type="number" min="1" value="{{ $item->quantity }}" wire:change="updateQuantity({{ $item->id }}, $event.target.value)">
                    <button class="rounded-md bg-gray-100 px-3 py-2 text-sm font-bold text-red-600" wire:click="removeItem({{ $item->id }})">Remove</button>
                </div>
            </div>
        @empty
            <div class="p-10 text-center">
                <p class="font-black">Your cart is empty</p>
                <a class="btn-primary mt-4" href="{{ route('products.index') }}">Start shopping</a>
            </div>
        @endforelse
    </div>
    <aside class="rounded-lg bg-white p-5 shadow-sm">
        <h2 class="text-xl font-black">Summary</h2>
        <div class="mt-4 grid gap-2 text-sm">
            <div class="flex justify-between"><span>Subtotal</span><strong>{{ number_format($subtotal, 2) }} €</strong></div>
            <div class="flex justify-between"><span>Discount</span><strong>-{{ number_format($discount, 2) }} €</strong></div>
            <div class="flex justify-between"><span>Shipping</span><strong>{{ number_format($shipping, 2) }} €</strong></div>
            <div class="flex justify-between border-t pt-3 text-lg"><span>Total</span><strong>{{ number_format($total, 2) }} €</strong></div>
        </div>
        <div class="mt-5 flex gap-2">
            <input class="field" wire:model="couponCode" placeholder="{{ __('messages.coupon') }}">
            <button class="rounded-md bg-gray-900 px-3 text-sm font-bold text-white" wire:click="applyCoupon">{{ __('messages.apply') }}</button>
        </div>
        <a class="btn-primary mt-5 w-full" href="{{ route('checkout.index') }}">{{ __('messages.checkout') }}</a>
    </aside>
</div>
