@props(['for' => null, 'value' => null])
<label @if($for) for="{{ $for }}" @endif {{ $attributes->merge(['class' => 'text-sm font-bold text-gray-800']) }}>
    {{ $value ?? $slot }}
</label>
