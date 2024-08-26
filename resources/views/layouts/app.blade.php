<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Junior Blog - Ваш гид в мире PHP, Laravel и Yii2. Узнайте о решении повседневных задач программиста, профессиональном росте и обучении. Полезные статьи и советы для программистов всех уровней.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords"
          content="PHP, Laravel, Yii2, программирование, обучение, профессиональный рост, задачи программиста">
    <meta name="yandex-verification" content="99fa8bc0aaba3590"/>
    <meta name="google-site-verification" content="0hcR8Eq0mO6ItZ5HZBze57apLJB-b0qzXTli5M0TfV4"/>
    <meta property="og:title" content="Junior Blog - Программирование на PHP, Laravel, Yii2">
    <meta property="og:description"
          content="Ваш гид в мире PHP, Laravel и Yii2. Узнайте о решении повседневных задач программиста, профессиональном росте и обучении. Полезные статьи и советы для программистов всех уровней.">
    <meta property="og:url" content="https://junior-blog.ru/">
    <meta property="og:type" content="website">

    <script src="https://kit.fontawesome.com/439cbc9af7.js" crossorigin="anonymous"></script>
    <title>@yield('title') | Junior Blog - Программирование на PHP, Laravel, Yii2</title>

    <!-- Scripts -->
    @vite( 'resources/js/app.js')
</head>
<body class="bg-gray-200 font-sans">

@include('layouts.header')
<main class="">
    @yield('content')
</main>
</body>
</html>
