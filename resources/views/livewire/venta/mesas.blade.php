<div>

    
    <x-cuerpo >
        <x-slot name="contenido">
            <div wire:poll.{{ config('sistema.synctime') }}s.visible="carga">
                @include('venta.includes.mesa.mesas-all')
            </div>
        </x-slot>
    
        <x-slot name="lateral">
            <div class="card my-3 mx-3">
                <small class="ml-3 mt-2">Total de Ordenes</small>
                <div class="h2-responsive text-center mx-3 "><div class="float-left">Ordenes Pendientes:</div> <div class="float-right">{{ $ordenesCant }}</div></div>
                <div class="h2-responsive text-center mx-3 "><div class="float-left">Cantidad de Clientes:</div> <div class="float-right">{{ $clientesCant }}</div></div>
            </div>
           <div class="card text-center">
                AGREGAR NUEVA ORDEN
                <div class="mt-4 mb-3 click">
                    <a data-toggle="modal" data-target="#AddMesa"> <i class="fas fa-plus-circle fa-7x mx-2 blue-text"></i> </a>
                </div>
           </div>
        </x-slot>

    </x-cuerpo>

       @include('venta.includes.modales.add-mesa')


</div>