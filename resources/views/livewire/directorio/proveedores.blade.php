<div>
    <x-cuerpo >
        <x-slot name="contenido">
            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Proveedores</h2> 
                <h2 class="float-right">
                    <a data-toggle="modal" data-target="#ModalAddProveedor" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i> Agregar Proveedor</a>
                </h2>
            </div>
            <x-directorio.proveedores :datos="$proveedores" />
            
            <div class="mt-4">
                {{ $proveedores->links() }}
            </div>
        </x-slot>
    
        <x-slot name="lateral">
            {{-- @json($clientes) --}}
        </x-slot>

    </x-cuerpo>

    <x-directorio.modal-add-proveedor />

</div>
