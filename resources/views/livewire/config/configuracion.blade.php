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
            <div class="mt-4 row justify-content-center">
                {!! QrCode::size(200)->generate(Request::root() . '/mobil/login/'); !!}
            </div>
            <div class="mt-4 row justify-content-center">Escanee el código en su aplicación móbil</div>
        </x-slot>

    </x-cuerpo>

    <x-config.modal-add-config />

    {{-- MOdales --}}
    <x-config.config.modal-principal />
    <x-config.config.modal-impresiones />
    <x-config.config.modal-sistema />


</div>
