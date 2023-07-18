<!DOCTYPE html>
<html class="dark">
    <head>
        <title>@stack('title')</title>

        <link rel="stylesheet" href="{{ asset('/vendor/laravel-piano-oauth/css/styles.css') }}" />
    </head>
    <body class="dark:bg-gray-800">
        <div class="flex justify-center items-center h-screen">
            @yield('content')
        </div>
    </body>
</html>
