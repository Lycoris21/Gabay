@props(['disabled' => false])

<input type="file" {{ $attributes->merge(['class' => 'w-1/2 p-2 border rounded']) }} />