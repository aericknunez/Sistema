<div>

    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <div class="h2 float-left">Reporte de Ventas 
                    @if ($busqueda != 10)
                       ( {{ tipoVenta($busqueda) }} )
                    @endif
                </div> 
                <div class="h2 float-right font-weight-bold text-uppercase"> 
                    {{-- Total: {{ dinero(collect($datos)->where('edo', 1)->sum('cantidad')) }}                 --}}
                </div>
            </div>


            <div wire:loading.remove wire:target="aplicarFechas">

                
                @include('components.facturacion.reporte-mensual')

            </div>

            <div class="row justify-content-center">
                <div  wire:loading wire:target="aplicarFechas">
                    <img src="{{ asset('img/loading.gif')}}" alt="">
                </div>
            </div>

        </x-slot>
    
        <x-slot name="lateral">
            <div class="clearfix mb-2">
                <div class="h2-responsive float-left">Seleccionar Fechas</div>
            </div> 

            <div class="card">
                <div class="card-body">

                    <div class="col mb-2">
                        <small>Tipo de documento</small>
                        <select class="browser-default custom-select" wire:model="busqueda">
                            <option value="10" selected >Seleccione el Documento</option>
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
                </div>
            </div>



            <div class="card mt-3">
                <form  class="md-form" wire:submit.prevent="aplicarFechas">

                <div class="row px-3">
                    <div class="col-6">

                        <small>Mes</small>
                        <select class="browser-default custom-select" wire:model="mesf">
                            <option>Seleccione un mes</option>
                            <option value="01">Enero</option>
                            <option value="02">Febrero</option>
                            <option value="03">Marzo</option>
                            <option value="04">Abril</option>
                            <option value="05">Mayo</option>
                            <option value="06">Junio</option>
                            <option value="07">Julio</option>
                            <option value="08">Agosto</option>
                            <option value="09">Septiembre</option>
                            <option value="10">Octubre</option>
                            <option value="11">Noviembre</option>
                            <option value="12">Diciembre</option>
                        </select>

                    </div>
                    <div class="col-6">
                        <small>Año</small>
                        <select class="browser-default custom-select" wire:model="aniof">
                            <option>Seleccione un año</option>
                            @for ($i =  date('Y'); $i >= 2016; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>

                 </div>

                </div>

                    <div class="text-right">
                        <a href="{{ route('reportePDF', ['busqueda' => $busqueda, 'anio' => $anio, 'mes' => $mes]) }}" class="btn btn-link btn-sm"  ><i class="fas fa-print mr-1"></i> Imprimir</a>

                        <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
                    </div>
                </form>

            </div>

            <small class="my-2"> Fecha : {{ $mes }} {{ $anio }}</small>

          {{-- Fecha1:  {{ $fecha1 }}
          Fecha2:   {{ $fecha2 }} --}}
        </x-slot>

    </x-cuerpo>

</div>