<div>

    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <div class="h2-responsive float-left">Ordenes del dia</div> 
            </div>


            <x-panel.ordenes :datos="$datos" />

            <div class="mt-2 float-right">{{ $datos->links() }}</div>

            {{-- @json($datos) --}}

        </x-slot>
    
        <x-slot name="lateral">
            <div class="clearfix mb-2">
                <div class="h2-responsive float-left">Datos Generales</div>
            </div> 

            <div class="card">

                <div class="card my-3 mx-3">
                    <small class="ml-3 mt-2">Total de Ordenes</small>
                    <div class="h2 text-center mx-3 "><div class="float-left">Total de Ordenes:</div> <div class="float-right">{{ $totalOrdenes }}</div></div>
                    <div class="h2 text-center mx-3 "><div class="float-left">Total LLevar:</div> <div class="float-right">{{ $totalLlevar }}</div></div>
                    <div class="h2 text-center mx-3 "><div class="float-left">Total Aqui:</div> <div class="float-right">{{ $totalAqui }}</div></div>
                </div>

                <div class="card mb-3 mx-3">
                    <small class="ml-3 mt-2">Ordenes Pendientes</small>
                    <div class="h2 text-center mx-3 "><div class="float-left">Total Pendientes:</div> <div class="float-right">{{ $totalPendientes }}</div></div>
                    <div class="h2 text-center mx-3 "><div class="float-left">Pentientes Llevar:</div> <div class="float-right">{{ $pendientesLlevar }}</div></div>
                    <div class="h2 text-center mx-3 "><div class="float-left">Pendientes Aqui:</div> <div class="float-right">{{ $pendientesAqui }}</div></div>
                </div>

            </div>

        </x-slot>

    </x-cuerpo>

</div>