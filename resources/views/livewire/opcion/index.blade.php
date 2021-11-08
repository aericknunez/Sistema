<div>
    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Opciones</h2> 
                <h2 class="float-right">
                    <a wire:click="newForm()" class="btn blue-gradient btn-sm"><i class="fas fa-plus"></i> Agregar Opciones</a>
                </h2>
            </div>

            <x-opcion.listado :datos="$opciones" />
        </x-slot>
    
        <x-slot name="lateral">

            @if ($openForm)
            <x-opcion.add-opcion />
            @endif
            @if ($openFormOptions)
            <x-opcion.add-opcion-sub :datos="$opcionSelect" :imgSelected="$imgSelected" />
            @endif

        </x-slot>

    </x-cuerpo>

{{-- Iconos debe ir dentro de livewire component  --}}
<x-globales.modal-iconos :datos="$iconos" />


</div>
