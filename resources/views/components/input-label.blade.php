@props(['value'])

<label {{ $attributes->merge(['class' => 'w-1']) }}>
    {{ $value ?? $slot }}
</label>
<!-- block font-medium text-sm text-gray-700 dark:text-gray-300 -->