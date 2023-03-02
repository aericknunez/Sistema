<div>
    {{-- Aqui se generara el corte, se ingresara la cantidad de efectivo actual --}}
 
    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Productos Asignados</h2> 
                <h2 class="float-right">
                    {{-- <a data-toggle="modal" data-target="#AsignarProducto"  class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i> Asignar Producto</a> --}}
                </h2>
            </div>

                @include('components.inventario.lista-asignados')


        </x-slot>
    
        <x-slot name="lateral">

            <div class="h2 float-left">Buscar</div>
              <div class="md-form mt-0">
                <input wire:model="search" class="form-control" type="text" placeholder="Buscar Producto" aria-label="Search" >
                <div class="float-right"><button wire:click="cancelar" class="btn btn-sm btn-link">Limpiar</button></div>
              </div>

        </x-slot>

    </x-cuerpo>

        <x-inventario.modal-add-asign :datos="$proSelect" :dependientes="$dependientes" />


</div>