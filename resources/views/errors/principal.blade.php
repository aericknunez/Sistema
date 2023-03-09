<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- Hojas de estilo del sistema --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome-582.css') }}">
        <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
        <link rel="stylesheet" href="
        @if (config('sistema.latam') == true)
        {{ asset('css/galeria-latam.css') }}
        @else
        {{ asset('css/galeria.css') }}
        @endif
        ">

        @livewireStyles

    </head>
    <body class="hidden-sn 
    @if (Session("config_skin"))
       {{  Session("config_skin") }}
    @else
        mdb-skin
    @endif">
    
        
          <div class="md-progress primary-color-dark">
            <div class="indeterminate"></div>
          </div>

        @if (session('just_data'))
            <x-menu-online />
        @else
            <x-menu />
        @endif


        <!-- Page Content -->
        <main class="container-fluid">


            <div class="mb-4">
                <div class="row justify-content-center click">
                    <img src="{{ asset("img/errors/503.png") }}" alt="Oops!">
                </div>
    
                <div>
                    <div class="h1 row justify-content-center text-uppercase">oops!</div>
                    <div class="h2 row justify-content-center">@yield('code', __('Oh no')) : @yield('message')</div>
                    <div class="row justify-content-center">@yield('texto')</div>
                    <div class="row justify-content-center"><a class="btn btn-primary"><i class="fa fa-upload mr-3"></i>Adquirir Caracteristica</a></div>
                </div>
            </div>

        </main>


        {{-- footer and scripts --}}

        @livewireScripts
                {{-- Scripts necesarios para el sistema que se van para footer --}}
                <script src="{{ asset('js/app.js') }}"></script>
                <script src="{{ asset('js/popper.min.js') }}"></script>
                <script src="{{ asset('js/mdb.min.js') }}"></script>
                <script src="{{ asset('js/scrollbar.js') }}"></script>
                <script src="{{ asset('js/side_nav.js') }}"></script>

        @stack('scripts')
    </body>
</html>