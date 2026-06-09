@props(['name', 'label' => null, 'value' => null])
<x-form.input :name="$name" :label="$label" type="date" :value="$value" {{ $attributes }} />
