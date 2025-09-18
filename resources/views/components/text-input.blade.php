@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'flex gap-[50px] w-[349px] h-[70px] rounded-[10px]']) }}>
