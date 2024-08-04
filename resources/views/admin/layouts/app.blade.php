<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/439cbc9af7.js" crossorigin="anonymous"></script>
    <title>{{ config('app.name', 'Laravel') }} | Админка</title>


    <!-- Scripts -->
    @vite( 'resources/js/admin/app.js')
</head>
<body class="" style="background: #edf2f7;">
<div>
    @if (session('success'))
        <x-admin-alerts-success-alert>
            {{session('success')}}
        </x-admin-alerts-success-alert>

    @endif
    @if (session('error'))
        <x-admin-alerts-danger-alert>
            {{session('error')}}
        </x-admin-alerts-danger-alert>

    @endif
    @if (session('info'))
        <x-admin-alerts-info-alert>
            {{session('info')}}
        </x-admin-alerts-info-alert>

    @endif
    @if (session('warning'))
        <x-admin-alerts-warning-alert>
            {{session('warning')}}
        </x-admin-alerts-warning-alert>

    @endif
    <div class="grid grid-cols-admin h-[100vh]">

        @include('admin.layouts.sidebar')
        <div class="w-full">
            @include('admin.layouts.header')
            <section class="p-4 ">
                @yield('content')
            </section>
        </div>
    </div>
</div>


</body>
</html>
