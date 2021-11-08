<div>
    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Categorias</h2> 
                <h2 class="float-right">
                    <a wire:click="newForm()" class="btn blue-gradient btn-sm"><i class="fas fa-plus"></i> Agregar Categoria</a>
                </h2>
            </div>

            <x-categoria.listado :datos="$categorias" />
        </x-slot>
    
        <x-slot name="lateral">
        @if ($category_id)
        {{ mensajex("Modificar Categoria", "success") }}
        @endif

        @if ($openForm)
        <x-categoria.add-categoria :imgSelected="$imgSelected" />
        @endif
        </x-slot>

    </x-cuerpo>

{{-- Iconos debe ir dentro de livewire component  --}}
<x-globales.modal-iconos :datos="$iconos" />

</div>
