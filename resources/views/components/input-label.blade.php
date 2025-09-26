@props(['value'])

<label {{ $attributes->merge(['class' => 'w-1']) }}>
    {{ $value ?? $slot }}
</label>