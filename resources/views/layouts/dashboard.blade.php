<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="https://www.twhive.com/assets/img/brand/icon.png" type="image/x-icon" />
    <!-- Favicon -->
    <link href="/assets/img/brand/favicon.png" rel="icon" type="image/png">

    @include('dashboard.css')
</head>
<body class="app sidebar-mini rtl" >
    @yield('content')

    @include('dashboard.js')
</body>
</html>
