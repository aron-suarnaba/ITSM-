<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark" data-bs-theme-base="slate"
    data-bs-theme-primary="teal" data-bs-theme-radius="2">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ITSM')</title>
    @vite(['resources\css\app.css', 'resources\js\app.js'])

</head>

<body>

    <div class="page">
        <div class="page-wrapper">
            @yield('header')


            <div class="page-wire">
                @yield('content')
            </div>

            @yield('footer')
        </div>
    </div>

</body>

</html>
