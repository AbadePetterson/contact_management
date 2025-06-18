<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body>
        {{ $slot }}

        <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
