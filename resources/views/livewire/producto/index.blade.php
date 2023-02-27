<div>
    <x-cuerpo >
        <x-slot name="contenido">
            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Productos</h2> 
                <h2 class="float-right">
                    <a wire:click="btnCrearIconos()" title="Crear Iconos" class="btn btn-link btn-sm"><i class="fas fa-plus"></i></a>
                    <a href="{{ route('producto.create') }}" class="btn blue-gradient btn-sm"><i class="fas fa-plus"></i> Agregar Producto</a>
                </h2>
            </div>
            <x-producto.listado :datos="$productos" />
            
            {{-- <div class="mt-4">
                @if (count($productos))
                {{ $productos->links('pagination::bootstrap-4') }}
                @endif
            </div> --}}
        </x-slot>
    
        <x-slot name="lateral">
            {{-- @json($productos) --}}
            <div class="h2 float-left">Buscar</div>
              <div class="md-form mt-0">
                <input wire:model="search" class="form-control" type="text" placeholder="Buscar Producto" aria-label="Search" >
                @if ($search)
                <div class="float-right"><button wire:click="cancelar" class="btn btn-sm btn-link">Limpiar</button></div>
                @endif
              </div>


        </x-slot>

    </x-cuerpo>

    <x-producto.modal-mod-precio />
    <x-producto.modal-mod-nombre />
    <x-producto.modal-mod-option :opciones="$opciones" :agregados="$OpAgregados" />
    <x-producto.modal-mod-categoria :datos="$categorias" />
    <x-producto.modal-mod-panel :datos="$paneles" />

    <x-globales.modal-iconos :datos="$iconos" />


</div>
