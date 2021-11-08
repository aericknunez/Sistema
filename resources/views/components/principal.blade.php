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
        <link rel="stylesheet" href="{{ asset('css/galeria.css') }}">

        @stack('style')

        @livewireStyles

    </head>
    <body class="hidden-sn 
    @if (Session("config_skin"))
       {{  Session("config_skin") }}
    @else
        black-skin
    @endif">
    
{{-- white-skin , mdb-skin , grey-skin , pink-skin ,  light-blue-skin , black-skin  cyan-skin, navy-blue-skin --}}

{{-- PRELOADER  --}}

{{-- <div id="mdb-preloader" class="flex-center">
    <div class="preloader-wrapper big active crazy">
        <div class="spinner-layer spinner-blue-only">
            <div class="circle-clipper left">
            <div class="circle"></div>
            </div>
            <div class="gap-patch">
            <div class="circle"></div>
            </div>
            <div class="circle-clipper right">
            <div class="circle"></div>
            </div>
        </div>
        </div>
</div>  --}}
        
          <div class="md-progress primary-color-dark">
            <div class="indeterminate"></div>
          </div>


        <x-menu />


        <!-- Page Content -->
        <main class="container-fluid">
            {{ $slot }}
        </main>


        {{-- footer and scripts --}}
        @stack('modals')

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