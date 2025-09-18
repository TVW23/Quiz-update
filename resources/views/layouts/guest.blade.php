<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div>
            <div>
                <a href="/">
                    <div class="container">
                        <div class="logo">
                            <x-consortium class="w-[120px] h-[120px] rounded-[10%]" />
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
