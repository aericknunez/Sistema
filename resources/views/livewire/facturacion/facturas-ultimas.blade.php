<div>

    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <div class="h2-responsive float-left">Ultimas Facturas Emitidas</div> 
                <div class="h2-responsive float-right font-weight-bold text-uppercase"> 
                    {{-- Total: {{ dinero(collect($datos)->where('edo', 1)->sum('cantidad')) }}                 --}}
                </div>
            </div>


            <div wire:loading.remove wire:target="aplicarFechas">
                <x-facturacion.lista-facturas-ultimas :datos="$datos" />
            </div>

            <div class="row justify-content-center">
                <div  wire:loading wire:target="aplicarFechas">
                    <img src="{{ asset('img/loading.gif')}}" alt="">
                </div>
            </div>

        </x-slot>
    
        <x-slot name="lateral">
            <div class="clearfix mb-2">
                <div class="h2-responsive float-left">Seleccionar Documento</div>
            </div> 
            <div class="card">
                <div class="card-body">


                    <div class="col mb-2">
                        <small>Tipo de documento</small>
                        <select class="browser-default custom-select" wire:model="busqueda">
                            <option value="10" selected >Todos</option>
                            @if ( $documentos->ninguno)
                                <option value="0">Ninguno</option>
                            @endif
                            @if ( $documentos->ticket)
                            <option value="1">Ticket</option>
                            @endif
                            @if ( $documentos->factura)
                            <option value="2">Factura</option>
                            @endif
                            @if ( $documentos->credito_fiscal)
                            <option value="3">Credito Fiscal</option>
                            @endif
                            @if ( $documentos->no_sujeto)
                            <option value="4">No Sujeto</option>
                            @endif
                        </select>
                    </div>

                    <form  class="md-form" wire:submit.prevent="aplicarBusqueda">

                        <div class="text-right">
                            <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
                        </div>
                    </form>

                </div>
            </div>

        </x-slot>

    </x-cuerpo>

</div>