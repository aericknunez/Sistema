<div>
    <x-cuerpo >
        <x-slot name="contenido">
            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Repartidores</h2> 
                <h2 class="float-right">
                    <a data-toggle="modal" data-target="#ModalAddRepartidor" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i> Agregar Repartidor</a>
                </h2>
            </div>
            <x-directorio.repartidores :datos="$repartidores" />
            
            <div class="mt-4">
                {{ $repartidores->links() }}
            </div>
        </x-slot>
    
        <x-slot name="lateral">
            {{-- @json($clientes) --}}
        </x-slot>

    </x-cuerpo>

    <x-directorio.modal-add-repartidor />

</div>
