<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>URL Shortener</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/d4dd29a761.js" crossorigin="anonymous"></script>

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        {{-- livewire --}}
        @livewireStyles
        @livewireScripts
    </head>
    <body>
        <main class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-t from-blue-950 to-blue-900">
            @yield('content')
        </main>
    </body>
</html>