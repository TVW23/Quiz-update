@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full h-[60px] rounded-[15px]']) }}>


<!-- 'class' => 'flex  w-[310px] md:w-[350px] lg:w-[350px] h-[60px] rounded-[15px]' -->
 <!-- w-full h-[60px] rounded-[15px] -->