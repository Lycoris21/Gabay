@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold text-sm text-black-700']) }}>
    {{ $value ?? $slot }}
</label>
