<div>
    {{-- Aqui se generara el corte, se ingresara la cantidad de efectivo actual --}}
 
    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Productos Asignados</h2> 
                <h2 class="float-right">
                    {{-- <a data-toggle="modal" data-target="#AsignarProducto"  class="btn blue-gradient btn-sm"><i class="fas fa-plus"></i> Asignar Producto</a> --}}
                </h2>
            </div>

                @include('components.inventario.lista-asignados')


        </x-slot>
    
        <x-slot name="lateral">



        </x-slot>

    </x-cuerpo>

        <x-inventario.modal-add-asign :datos="$proSelect" :dependientes="$dependientes" />


</div>