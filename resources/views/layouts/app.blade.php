<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Test') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased flex flex-col min-h-screen">
        <!-- Wrapper div to manage layout -->
        <div class="flex flex-col flex-1">
            <!-- Page Heading -->

                <header class="bg-white">
                    @include('partials.header')
                </header>


            <!-- Page Content -->
            <main class="flex-1">
                @yield('content')
            </main>
        </div>

        <!-- Footer -->
        <footer class="bg-Jesper dark:bg-Jesper w-full h-[60px] p-4">
            @include('partials.footer')
        </footer>
    </body>
</html>
