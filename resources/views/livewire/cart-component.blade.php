<div>
    @if (! $cart || $cart->items->isEmpty())
        <p class="muted">The cart is empty.</p>
    @else
        @foreach ($cart->items as $item)
            <div class="list-row">
                <div>
                    <p class="font-bold">{{ $item->product->translatedName() }}</p>
                    <p class="muted">{{ number_format($item->unit_price, 2) }} EUR x {{ $item->quantity }}</p>
                </div>
                <div class="row-actions">
                    <button wire:click="decrease({{ $item->id }})" class="btn btn-secondary btn-small" type="button">-</button>
                    <button wire:click="increase({{ $item->id }})" class="btn btn-secondary btn-small" type="button">+</button>
                    <button wire:click="remove({{ $item->id }})" class="btn btn-danger btn-small" type="button">Remove</button>
                </div>
            </div>
        @endforeach
        <div class="mt-4 flex justify-between font-bold">
            <span>Total</span>
            <span class="price">{{ number_format($cart->total(), 2) }} EUR</span>
        </div>
        <a href="{{ route('checkout.create') }}" class="btn btn-primary mt-4">{{ __('messages.checkout') }}</a>
    @endif
</div>
