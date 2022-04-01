<div>
    <x-cuerpo >
        <x-slot name="contenido">
            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Clientes</h2> 
                <h2 class="float-right">
                    <a data-toggle="modal" data-target="#ModalAddCliente" class="btn blue-gradient btn-sm"><i class="fas fa-plus"></i> Agregar Cliente</a>
                </h2>
            </div>
            <x-directorio.clientes :datos="$clientes" />
            
            <div class="mt-4">
                {{ $clientes->links() }}
            </div>
        </x-slot>
    
        <x-slot name="lateral">
            {{-- @json($clientes) --}}
        </x-slot>

    </x-cuerpo>

    {{-- <x-venta.modal-add-cliente /> --}}
    @include('venta.includes.modales.add-cliente-delivery')

</div>
