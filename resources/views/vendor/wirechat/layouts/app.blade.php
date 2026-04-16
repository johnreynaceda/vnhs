<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <!-- JavaScript to prevent flickering (Light Mode Enforced) -->
    <script>
        document.documentElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @filamentStyles
    @vite('resources/css/app.css')



    @livewireStyles
    @wirechatStyles
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white dark:bg-gray-900">

        <!-- Page Content -->
        <main class="h-[calc(100vh_-_0.0rem)]">
            {{ $slot }}
        </main>

    </div>
    @filamentScripts
    @vite('resources/js/app.js')
    @livewireScripts
    @wirechatAssets

</body>

</html>
