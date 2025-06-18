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
        @auth
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <div class="container">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="30" class="d-inline-block align-text-top me-2">
                        Sistema de Contatos
                    </a>
                    <div class="navbar-nav ms-auto">
                        <span class="navbar-text me-3">
                            Olá, {{ Auth::user()->name }}
                        </span>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm">
                                <i class="fas fa-sign-out-alt"></i> Sair
                            </button>
                        </form>
                    </div>
                </div>
            </nav>
        @endauth

        {{ $slot }}

        <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
