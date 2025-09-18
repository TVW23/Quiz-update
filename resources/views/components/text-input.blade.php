@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'flex w-[350px] h-[60px] rounded-[15px]']) }}>
