@props(['image_buttonColor' => '#39B9EC'])
<button style="background-color: {{ $image_buttonColor ?? '#39B9EC' }};" {{ $attributes->merge(['type' => 'submit', 'class' => 'flex items-center justify-self-center justify-center w-full h-[40px] rounded-[15px] items-start mt-[20px] text-white']) }}>
    {{ $slot }}
</button>