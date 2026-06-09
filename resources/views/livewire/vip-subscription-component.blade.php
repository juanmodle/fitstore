<div>
    @if ($subscription)
        <p class="font-bold">Your VIP subscription is active until {{ $subscription->end_date?->format('d/m/Y') }}.</p>
        <a href="{{ route('pdf.vip-receipt', $subscription) }}" class="btn btn-secondary mt-3">VIP receipt PDF</a>
    @else
        <form method="POST" action="{{ route('vip-subscription.store') }}" class="grid gap-3 md:grid-cols-3">
            @csrf
            <x-select name="payment_method_id">
                @foreach ($paymentMethods as $method)
                    <option value="{{ $method->id }}">{{ $method->name }}</option>
                @endforeach
            </x-select>
            <p class="py-2 font-bold">15.00 EUR / month</p>
            <button class="btn btn-primary" type="submit">Activate VIP</button>
        </form>
    @endif
</div>
