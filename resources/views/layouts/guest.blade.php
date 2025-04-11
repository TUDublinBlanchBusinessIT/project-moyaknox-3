<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">

    <!-- Centered wrapper for content -->
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0 bg-gray-100">

        <!-- Logo -->
        <div class="flex justify-center mt-10 mb-6">
           <img src="{{ asset('images/floralmeath-logo.png') }}"
                alt="Floral Meath Logo"
                style="max-height: 150px;"
                class="rounded-xl shadow-md">
        </div>


        <!-- Form card -->
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>

    </div>
</body>
</html>
