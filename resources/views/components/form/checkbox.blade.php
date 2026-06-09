@props(['name', 'label', 'checked' => false])
<label class="flex items-center gap-2 text-sm font-bold text-gray-800">
    <input type="hidden" name="{{ $name }}" value="0">
    <input type="checkbox" name="{{ $name }}" value="1" @checked(old($name, $checked)) {{ $attributes }}>
    {{ $label }}
</label>
