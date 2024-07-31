<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/439cbc9af7.js" crossorigin="anonymous"></script>
    <title>{{ config('app.name', 'Laravel') }} | Админка</title>


    <!-- Scripts -->
    @vite( 'resources/js/app.js')
</head>
<body class="" style="background: #edf2f7;">
<div>
    <div class="grid grid-cols-admin">
        @include('admin.layouts.sidebar')
        <div class="w-full">
            @include('admin.layouts.header')
            @yield('content')
        </div>
    </div>
</div>



</body>
</html>
