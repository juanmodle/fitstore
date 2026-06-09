<div class="rounded-lg bg-white p-6 shadow-sm">
    @if($message)<div class="mb-4 rounded-md bg-green-50 px-4 py-3 text-sm font-bold text-green-700">{{ $message }}</div>@endif
    @if($subscription && $subscription->status === 'active')
        <h2 class="text-2xl font-black">VIP active</h2>
        <p class="mt-2 text-gray-500">Active until {{ optional($subscription->end_date)->format('d/m/Y') }}. Monthly price: {{ number_format($subscription->monthly_price, 2) }} €.</p>
        <a class="btn-secondary mt-5" href="{{ route('customer.giveaways.index') }}">View giveaways</a>
    @else
        <h2 class="text-2xl font-black">Subscribe now</h2>
        <form class="mt-4 grid gap-4" method="post" action="{{ route('vip-subscription.store') }}">
            @csrf
            <label class="grid gap-2 text-sm font-bold">Payment method
                <select class="field" name="payment_method_id">
                    @foreach($paymentMethods as $method)
                        <option value="{{ $method->id }}">{{ $method->name }}</option>
                    @endforeach
                </select>
            </label>
            <button class="btn-primary w-fit" type="submit">Activate VIP</button>
        </form>
    @endif
</div>
