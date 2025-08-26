<!DOCTYPE html>
<html lang="en" class="h-full scroll-smooth">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite('resources/css/app.css')
        <title>Document</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </head>
    <body class="font-display">
        <div class="max-w-screen min-h-full">
            <x-navbar></x-navbar>
            {{-- <x-header>{{ $title }}</x-header> --}}
            <main>
                <div class="mx-auto">
                    {{ $slot }}
                </div>
            </main>
            <x-footer></x-footer>
        </div>
    </body>
</html>