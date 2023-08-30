<div>
    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <div class="h2 float-left">Gastos</div> 
                <div class="h2 float-right">
                    <a data-toggle="modal" data-target="#ModalAddGasto" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i> Agregar Gasto</a>
                </div>
            </div>

        <x-efectivo.gastos.lista-gastos :datos="$gastos" />

        </x-slot>
    
        <x-slot name="lateral">

        <div class="card">
            <div class="card-body px-lg-5 pt-0 text-center mt-3" style="color: #757575;">
                {{-- Form  --}}
                <div class="h4-responsive">
                    TOTAL GASTOS EFECTIVO:
                </div>
                <div class="h1-responsive">
                    {{ dinero($gastosefec) }} 
                </div>
                {{-- form  --}}
            </div>

            <div class="card-body px-lg-5 pt-0 text-center mt-3" style="color: #757575;">
                {{-- Form  --}}
                <div class="h4-responsive">
                    TOTAL TODOS LOS GASTOS:
                </div>
                <div class="h1-responsive">
                    {{ dinero($todosgastos) }} 
                </div>
                {{-- form  --}}
            </div>
        </div>
        <div class="text-center click">
            <a wire:click="imprimirGastosBySearch()" class="btn-floating btn-info btn-md mb-3 waves-effect waves-light" title="Imprimir Gastos"><i class="fas fa-print"></i></a>
        </div>
        </x-slot>

    </x-cuerpo>

    <x-efectivo.gastos.modal-agregar 
    :datos="['bancos' => $bancos, 'categorias' => $categorias]" 
    :tipo="['tipo_pago' => $tipo_pago, 'tipo' => $tipo, 'tcomprobante' => $tipocomprobante]" />

</div>