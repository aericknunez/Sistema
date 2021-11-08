<div>
    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Agregar Producto</h2> 
                <h2 class="float-right">
                    {{-- <a wire:click="newForm()" class="btn blue-gradient btn-sm"><i class="fas fa-plus"></i> Agregar Categoria</a> --}}
                </h2>
            </div>

        <x-producto.crear :categorias="$categorias" :opciones="$opciones" :paneles="$paneles" :imgSelected="$imgSelected" />

        </x-slot>
    
        <x-slot name="lateral">
            
            {{-- @json($iconos) --}}

        </x-slot>

    </x-cuerpo>

{{-- Iconos debe ir dentro de livewire component  --}}
    <x-globales.modal-iconos :datos="$iconos" />

</div>