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


            {{-- <x-inventario.lista-productos :datos="$productos" /> --}}


        </x-slot>
    
        <x-slot name="lateral">



        </x-slot>

    </x-cuerpo>

        @include('components.inventario.modal-producto-nuevo')
        {{-- <x-inventario.modal-agregar  /> --}}

</div>