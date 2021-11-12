<x-principal-layout>

    {{-- Contenido --}}
    <x-contenido >

        <div class="row justify-content-center">
            <img src="{{ asset('img/imagenes/error.png') }}" alt="Error de Apertura" class="img-fluid"><br>
        </div>
        <div class="row justify-content-center">
            {{ mensajex('No tiene acceso a esta sección por que no tiene una caja aperturada','info','<a class="btn btn-dark btn-rounded" data-toggle="modal" data-target="#ModalOrdenes">Generar Ordenes</a>','<a class="btn btn-success btn-rounded" data-toggle="modal" data-target="#ModalAperturar">Aperturar Caja</a>') }}
        </div>

    </x-contenido>
    {{-- contenido  --}}
</x-principal-layout>