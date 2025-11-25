@props(['title' => 'ITSM+', 'content' => '', 'header' => '', 'footer' => '',])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark" data-bs-theme-base="slate"
    data-bs-theme-primary="teal" data-bs-theme-radius="2">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources\css\app.css', 'resources\js\app.js'])

</head>

<body class="body-marketing body-gradient">

    <div class="page">

        {{ $header }}


        <div class="page-wrapper">
            {{ $content }}
        </div>


    </div>

</body>

</html>
