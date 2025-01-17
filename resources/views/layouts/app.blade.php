<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        @if (session()->has('message'))
        <x-alert :message="session('message')"></x-alert>
        @endif

        @isset($header)
        <!-- Page Heading -->
        <header class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main class="pt-8">
            {{ $slot }}
        </main>

        <footer class="bg-white border-t dark:bg-gray-800 dark:border-gray-700 mt-5">
            <x-container>
                <div class="flex justify-between">
                    <div class="py-6 text-gray-500 dark:text-gray-400 font-light">
                        &copy; {{ config('app.name') }} {{ date('Y') }}
                    </div>
                    <div class="py-6 text-gray-500 dark:text-gray-400 font-light">
                        This page took {{ (round(microtime(true) - LARAVEL_START, 3)) }} seconds to render
                    </div>

                </div>
            </x-container>
        </footer>
    </div>
</body>

</html>