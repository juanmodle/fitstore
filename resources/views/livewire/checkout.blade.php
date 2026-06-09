<div class="rounded-lg bg-white p-6 shadow-sm">
    @if($notice)<div class="mb-4 rounded-md bg-red-50 px-4 py-3 text-sm font-bold text-red-700">{{ $notice }}</div>@endif
    <div class="grid gap-5 md:grid-cols-2">
        <label class="grid gap-2 text-sm font-bold">{{ __('messages.shipping_address') }}
            <select class="field" wire:model="shippingAddressId">@foreach($addresses as $address)<option value="{{ $address->id }}">{{ $address->street }}, {{ $address->city }}</option>@endforeach</select>
        </label>
        <label class="grid gap-2 text-sm font-bold">{{ __('messages.billing_address') }}
            <select class="field" wire:model="billingAddressId">@foreach($addresses as $address)<option value="{{ $address->id }}">{{ $address->street }}, {{ $address->city }}</option>@endforeach</select>
        </label>
        <label class="grid gap-2 text-sm font-bold">{{ __('messages.payment_method') }}
            <select class="field" wire:model="paymentMethodId">@foreach($paymentMethods as $method)<option value="{{ $method->id }}">{{ $method->name }}</option>@endforeach</select>
        </label>
        <label class="grid gap-2 text-sm font-bold">{{ __('messages.coupon') }}
            <input class="field" wire:model="couponCode" placeholder="WELCOME10">
        </label>
        <label class="grid gap-2 text-sm font-bold md:col-span-2">{{ __('messages.notes') }}
            <textarea class="field" wire:model="notes" rows="3"></textarea>
        </label>
    </div>
    <button class="btn-primary mt-6" wire:click="confirm" wire:loading.attr="disabled">{{ __('messages.confirm_order') }}</button>
    <span class="ml-3 text-sm font-bold text-gray-500" wire:loading>{{ __('messages.creating_order') }}</span>
</div>
