<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="https://www.twhive.com/assets/img/brand/icon.png" type="image/x-icon" />

    @include('search.css')
</head>
<body class="app sidebar-mini rtl" >
    @yield('content')

    @include('search.js')
</body>
</html>
