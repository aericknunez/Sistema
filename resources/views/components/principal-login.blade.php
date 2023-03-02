<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Hojas de estilo del sistema --}}
        <link rel="stylesheet" href="{{ asset('archivos_login/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('archivos_login/css/common.css') }}">
        <link href="{{ asset('archivos_login/css/css?family=Open+Sans:400,600,700&amp;display=swap') }}" rel="stylesheet">
        <link href="
        @if (Request::root() == 'https://latam-pos.com' or Request::root() == 'http://template.test')
        {{ asset('archivos_login/css/theme-latam.css') }}
        @else
        {{ asset('archivos_login/css/theme.css') }}
        @endif
        " rel="stylesheet">

        @stack('style')

        @livewireStyles


    </head>
    <body>
    
            {{ $slot }}

        {{-- footer and scripts --}}
        @stack('modals')

        @livewireScripts
                {{-- Scripts necesarios para el sistema que se van para footer --}}
                <script src="{{ asset('archivos_login/js/jquery.min.js') }}"></script>
                <script src="{{ asset('archivos_login/js/bootstrap.min.js') }}"></script>
                <script src="{{ asset('archivos_login/js/main.js') }}"></script>
                <script src="{{ asset('archivos_login/js/demo.js') }}"></script>

        @stack('scripts')
    </body>
</html>