<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Junior Blog - Ваш гид в мире PHP, Laravel и Yii2. Узнайте о решении повседневных задач программиста, профессиональном росте и обучении. Полезные статьи и советы для программистов всех уровней.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="PHP, Laravel, Yii2, программирование, обучение, профессиональный рост, задачи программиста">
    <title>Junior Blog - Программирование на PHP, Laravel, Yii2</title>
    <meta property="og:title" content="Junior Blog - Программирование на PHP, Laravel, Yii2">
    <meta property="og:description" content="Ваш гид в мире PHP, Laravel и Yii2. Узнайте о решении повседневных задач программиста, профессиональном росте и обучении. Полезные статьи и советы для программистов всех уровней.">
    <meta property="og:url" content="https://junior-blog.ru/">
    <meta property="og:type" content="website">
    <link rel="canonical" href="https://junior-blog.ru/">

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
