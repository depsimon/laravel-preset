<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ ($title ? $title . ' | ' : '') . config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="antialiased font-sans">
    <div class="flex flex-col justify-center min-h-screen py-12 bg-gray-100 bg-opacity-50 sm:px-6 lg:px-8">
        {{ $slot }}
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
