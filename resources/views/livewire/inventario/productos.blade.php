<div>
    {{-- Aqui se generara el corte, se ingresara la cantidad de efectivo actual --}}
 
    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Productos Agregados</h2> 
                <h2 class="float-right">
                    <a data-toggle="modal" data-target="#ProductoNuevo"  class="btn blue-gradient btn-sm"><i class="fas fa-plus"></i> Agregar Producto</a>
                </h2>
            </div>


            <x-inventario.lista-dependientes :datos="$productos" />


        </x-slot>
    
        <x-slot name="lateral">

            <div class="h2 float-left">Buscar</div>
              <div class="md-form mt-0">
                <input wire:model="search" class="form-control" type="text" placeholder="Buscar Producto" aria-label="Search" >
                @if ($search)
                <div class="float-right"><button wire:click="cancelar" class="btn btn-sm btn-link">Limpiar</button></div>
                @endif
              </div>

        </x-slot>

    </x-cuerpo>

        @include('components.inventario.modal-producto-nuevo')
        @include('components.inventario.modal-edit-pro')
        {{-- <x-inventario.modal-agregar  /> --}}

</div>