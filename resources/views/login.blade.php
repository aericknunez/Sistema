<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Ingresar al Sistema</title>

        {{-- Hojas de estilo del sistema --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome-582.css') }}">
        <link rel="stylesheet" href="{{ asset('css/mdb.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/galeria.css') }}">

        @stack('style')

        @livewireStyles


    <style>body { overflow-x: hidden; padding-left: 15px; }</style>
</head>

<body class="hidden-sn  white-skin">
<main id="todocontenido">


<!-- <div class="container"> -->
<div class="row">

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">


<!-- Section: Team v.1 -->
<section class="team-section text-center">

    @livewire('login.login')


</section>
<!-- Section: Team v.1 -->


	</div>

</div>
<!-- </div> -->


<div class="fixed-bottom">
    <a href="{{ route('login') }}" class="btn btn-link btn-sm">Cambiar inicio</a>
</div>

</main>

@livewireScripts
{{-- Scripts necesarios para el sistema que se van para footer --}}
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/mdb.min.js') }}"></script>

    <script>
        Livewire.on('modal', ()=>{
            $('#ModalUser').modal('show');
        });

        Livewire.on('cerrarmodal', ()=>{
            $('#ModalUser').modal('hide');
        });

    </script>


<script>

function mostrarContrasena(){
      var tipo = document.getElementById("password");
      if(tipo.type == "password"){
          tipo.type = "text";
          document.getElementById('icon').className = 'fa fa-eye-slash';
          document.getElementById('icon').className = document.getElementById('icon').className.replace( /(?:^|\s)fa fa-eye(?!\S)/g , '' )
        }else{
          tipo.type = "password";
          document.getElementById('icon').className = 'fa fa-eye';
          document.getElementById('icon').className = document.getElementById('icon').className.replace( /(?:^|\s)fa fa-eye-slash(?!\S)/g , '' )
      }
  }
    </script>
 

</body>
</html>

