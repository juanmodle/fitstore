@props(['name', 'label' => null, 'value' => null])
<div class="grid gap-2">
    @if($label)<x-form.label :for="$name" :value="$label" />@endif
    <textarea id="{{ $name }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'field']) }}>{{ old($name, $value) }}</textarea>
    @error($name)<p class="text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
</div>
