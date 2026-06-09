@props(['name', 'label' => null, 'options' => [], 'selected' => null])
<div class="grid gap-2">
    @if($label)<x-form.label :for="$name" :value="$label" />@endif
    <select id="{{ $name }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'field']) }}>
        {{ $slot }}
        @foreach($options as $value => $text)
            <option value="{{ $value }}" @selected((string) old($name, $selected) === (string) $value)>{{ $text }}</option>
        @endforeach
    </select>
    @error($name)<p class="text-sm font-semibold text-red-600">{{ $message }}</p>@enderror
</div>
