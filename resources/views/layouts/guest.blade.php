<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'SIKEPEL') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">

        {{-- Full-screen background --}}
        <div class="min-h-screen w-full relative flex items-center justify-center overflow-hidden"
             style="background-image: url('/assets/background.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            {{-- Subtle overlay so form stands out --}}
            <div class="absolute inset-0 bg-white/10"></div>

            {{-- Centered form container --}}
            <div class="relative z-10 w-full max-w-sm mx-4">
                {{ $slot }}
            </div>
        </div>

    </body>
</html>
