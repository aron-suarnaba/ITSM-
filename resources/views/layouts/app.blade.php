<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ITSM')</title>
    @vite(['resources\css\app.css', 'resources\js\app.js'])
</head>

<body>

    <div class="page">
        @yield('header')

        @yield('content')

        @yield('footer')
    </div>

</body>

</html>
