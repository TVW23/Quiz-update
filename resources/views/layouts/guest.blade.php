<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    @props(['image_buttonColor' => '#39B9EC'])
    <body>
        <div class="h-screen overflow-hidden flex flex-col items-center justify-center">
            <div>
                <a href="/">
                    <div class="container flex">
                        <div class="mb-[50px] w-[150px] h-[150px] rounded-[10%] flex items-center justify-center overflow-hidden"
                            style="background-color: {{ $image_buttonColor ?? '#39B9EC' }};">
                            <x-consortium class="flex w-[120px] h-[120px] rounded-[10%]" />
                        </div>
                    </div>
                </a>
            </div>

            <div>
                {{ $slot }}
            </div>
        </div>
    </body>
</html>