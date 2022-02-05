<div>

    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <div class="h2 float-left">Resumen de Datos</div> 
                <div class="h2 float-right font-weight-bold text-uppercase"> 
                </div>
            </div>


            <div wire:loading.remove wire:target="aplicarFechas">
                {{-- <x-historial.gastos-listado :datos="$datos" /> --}}


<div class="row">

    <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
      <div class="card-counter light z-depth-2">
        <i class="fas fa-money-check-alt"></i>
        <span class="count-numbers"><h5 class="font-weight-bold">{{ dinero($ventas) }}</h5></span>
        <span class="count-name">Total de Ventas</span>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
      <div class="card-counter light z-depth-2">
        <i class="fas fa-money-bill-alt"></i>
        <span class="count-numbers"><h5 class="font-weight-bold">{{ dinero($gastos) }}</h5></span>
        <span class="count-name">Total de Gastos</span>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
      <div class="card-counter light z-depth-2">
        <i class="fas fa-money-bill-wave"></i>
        <span class="count-numbers"><h5 class="font-weight-bold">{{ dinero($ventas - $gastos) }}</h5></span>
        <span class="count-name">Utilidades</span>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4  col-sm-6 col-6">
      <div class="card-counter light z-depth-2">
        <i class="fas fa-dollar-sign"></i>
        <span class="count-numbers"><h5 class="font-weight-bold">{{ dinero(collect($cuentas)->sum('saldo')) }}</h5></span>
        <span class="count-name">Total en Cuentas</span>
      </div>
    </div>


  </div>





@foreach ($cuentas as $cuenta)
    <div class="card col-12 col-md-4 mx-2 my-3">
        <div class="card-header h4 bg-info">
            {{ $cuenta->cuenta }}
        </div>
        <div class="card-body">
            <h1 class="text-center">{{ dinero($cuenta->saldo) }}</h1>
        </div>
    </div>
@endforeach


            </div>

            <div class="row justify-content-center">
                <div  wire:loading wire:target="aplicarFechas">
                    <img src="{{ asset('img/loading.gif')}}" alt="">
                </div>
            </div>

        </x-slot>
    
        <x-slot name="lateral">
            <div class="clearfix mb-2">
                <div class="h2 float-left">Seleccionar Fechas</div>
            </div> 

            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <select class="browser-default custom-select" wire:model="tipo_fecha">
                            <option value="1" selected >Fecha Unica</option>
                            <option value="2">Rango de Fechas</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <form  class="md-form" wire:submit.prevent="aplicarFechas">

                <div class="row">
                    <div class="col mx-2">

                           <div class="md-form md-outline input-with-post-icon datepicker">
                            <input wire:model.defer="fecha1f" type="date" id="fecha1" name="fecha1" class="form-control">
                            <label for="example">Seleccione una fecha</label>
                          </div>


                    </div>
                    @if ($tipo_fecha == 2)
                        
                    <div class="col mx-2">
                            <div class="md-form md-outline input-with-post-icon datepicker">
                            <input wire:model.defer="fecha2f"  type="date" id="fecha2" name="fecha2" class="form-control">
                            <label for="example">Seleccione una fecha</label>
                          </div>
                    </div>

                    @endif

                </div>

                    <div class="text-right">
                        <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
                    </div>
                </form>

            </div>

            @if ($tipo_fecha == 1)
            <small class="my-2"> Fecha seleccionada: {{ formatFecha($fecha1) }}</small>
            @else
            <small class="my-2"> Fecha desde : {{ formatFecha($fecha1) }} hasta: {{ formatFecha($fecha2) }}</small>
            @endif

        </x-slot>

    </x-cuerpo>

</div>