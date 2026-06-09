@props(['name', 'label' => null, 'type' => 'text', 'value' => null])
<div class="grid gap-2">
    @if($label)<x-form.label :for="$name" :value="$label" />@endif
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" value="{{ old($name, $value) }}" {{ $attributes->merge(['class' => 'field']) }}>
    @error($name)<p class="text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
</div>
