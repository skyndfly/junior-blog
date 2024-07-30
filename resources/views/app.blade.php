<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/439cbc9af7.js" crossorigin="anonymous"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite( 'resources/js/app.js')
</head>
<body class="bg-gray-200 font-sans">
<div class="container mx-auto">
    @include('layouts.header')

    <div class="grid grid-cols-table gap-8 py-14">
        <main class="">
            @yield('content')
        </main>
        <section class="">
            @include('layouts.news-list')
        </section>
    </div>
</div>
</body>
</html>
