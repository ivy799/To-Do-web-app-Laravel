<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>...
    </head>
    <body class="antialiased">
        <nav class="relative p-4">
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
        </nav>
        <div class="relative flex items-top justify-center
            min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4
            sm:pt-0">
            @yield('content')
        </div>
    </body>
</html>
