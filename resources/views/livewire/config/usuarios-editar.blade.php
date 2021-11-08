<div>
    <x-cuerpo >
        <x-slot name="contenido">
            <div class="clearfix mb-2">
                <div class="h2-responsive float-left">Editar Usuarios</div> 
                <div class="float-right">
                    {{-- <a data-toggle="modal" data-target="#ModalAddCliente" class="btn blue-gradient btn-sm"><i class="fas fa-plus"></i> Agregar Cliente</a> --}}
                </div>
            </div>
            <x-config.usuarios-editar :datos="$usuarios" />
            
            <div class="mt-4">
                {{ $usuarios->links() }}
            </div>
        </x-slot>
    
        <x-slot name="lateral">
            {{-- @json($clientes) --}}
        </x-slot>

    </x-cuerpo>

    <x-config.modal-mod-user />

</div>
.
