<div>
    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Entradas y Salidas de Efectivo</h2> 
                <h2 class="float-right">
                    <a data-toggle="modal" data-target="#ModalAddEntrada" class="btn blue-gradient btn-sm"><i class="fas fa-plus"></i> Realizar registro</a>
                </h2>
            </div>

        <x-efectivo.entradas.lista-entradas-salidas :datos="$datos" />

        </x-slot>
    
        <x-slot name="lateral">
            
            <div class="card">
                <div class="card-body px-lg-5 pt-0 text-center mt-3" style="color: #757575;">
                    {{-- Form  --}}
                    <div class="h4">
                        TOTAL ENTRADAS:
                    </div>
                    <div class="h1">
                        {{ dinero($totalEntradas) }} 
                    </div>

                    <div class="h4">
                        TOTAL SALIDAS:
                    </div>
                    <div class="h1">
                        {{ dinero($totalSalidas) }} 
                    </div>
                    {{-- form  --}}
                </div>
            </div>

        </x-slot>

    </x-cuerpo>

    <x-efectivo.entradas.modal-add-entrada-salida
    :datos="$bancos" 
    :tipo="$tipo_pago" />

</div>