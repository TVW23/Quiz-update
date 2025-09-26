@props(['disabled' => false])
<!-- Invoer veld component -->
<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full h-[60px] rounded-[15px] text-black']) }}>