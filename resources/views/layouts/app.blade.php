<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('img/vuejs.png') }}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>
    @yield('content')
    @include('partials.lessons')
    <script src="{{ asset('js/app.js') }}" /></script>
    @yield('vuejs')
    <script src="{{ asset('js/lessons.js') }}"></script>
  </body>
</html>
