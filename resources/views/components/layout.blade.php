<!DOCTYPE html>
<html lang="en" class="h-full scroll-smooth">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title ?? 'FORTIK - Forum Teknologi Informasi dan Komunikasi' }}</title>
        @stack('meta')
        
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo-favicon.png') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
        @vite('resources/css/app.css')
        @livewireStyles
        <style>
            .swiper-button-next::after,
            .swiper-button-prev::after {
            content: "" !important;
            }
        </style>
    </head>
    <body>
        <div class="max-w-screen min-h-full">
            <x-navbar></x-navbar>
            <main>
                <div class="mx-auto">
                    {{ $slot }}
                </div>
                @livewireScripts
            </main>
            <x-footer></x-footer>
        </div>
    </body>
</html>