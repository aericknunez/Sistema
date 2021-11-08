<div>
    <x-cuerpo >
        <x-slot name="contenido">
            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Configuración</h2>
            </div>
            <x-config.config-principal :datos="['data' => $config, 'tipo' => $tipoBusqueda]" />
            
        </x-slot>
    
        <x-slot name="lateral">
            <x-config.configuracion :datos="$datos" />

        </x-slot>

    </x-cuerpo>

    <x-config.modal-add-config />

    {{-- MOdales --}}
    <x-config.config.modal-principal />
    <x-config.config.modal-impresiones />
    <x-config.config.modal-sistema />


</div>
