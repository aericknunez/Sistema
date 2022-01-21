<div>
    <x-cuerpo >
        <x-slot name="contenido">
            <div class="clearfix mb-2">
                <div class="h2-responsive float-left">Opciones de actualización</div> 
                <div class="h2-responsive float-right">
                    {{-- <a data-toggle="modal" data-target="#ModalAddGasto" class="btn blue-gradient btn-sm"><i class="fas fa-plus"></i> Agregar Gasto</a> --}}
                </div>
            </div>

            <x-config.lista-opciones  />
            


        </x-slot>
    
        <x-slot name="lateral">
            {{ $sysUpdate }}
        </x-slot>

    </x-cuerpo>


</div>
.
