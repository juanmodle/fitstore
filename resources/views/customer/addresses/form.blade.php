<x-label>Type</x-label>
<x-select name="type">
    <option value="shipping" @selected(old('type', $address->type ?? '') === 'shipping')>Shipping</option>
    <option value="billing" @selected(old('type', $address->type ?? '') === 'billing')>Billing</option>
</x-select>
<x-label class="mt-3">Name</x-label>
<x-input name="name" value="{{ old('name', $address->name ?? '') }}" />
<x-label class="mt-3">Street</x-label>
<x-input name="street" value="{{ old('street', $address->street ?? '') }}" />
<x-label class="mt-3">City</x-label>
<x-input name="city" value="{{ old('city', $address->city ?? '') }}" />
<x-label class="mt-3">Province</x-label>
<x-input name="province" value="{{ old('province', $address->province ?? '') }}" />
<x-label class="mt-3">Postal code</x-label>
<x-input name="postal_code" value="{{ old('postal_code', $address->postal_code ?? '') }}" />
<x-label class="mt-3">Country</x-label>
<x-input name="country" value="{{ old('country', $address->country ?? 'Spain') }}" />
<label class="mt-3 flex items-center gap-2 text-sm">
    <x-checkbox name="is_default" @checked(old('is_default', $address->is_default ?? false)) /> Default address
</label>
<button class="btn btn-primary mt-4" type="submit">Save address</button>
