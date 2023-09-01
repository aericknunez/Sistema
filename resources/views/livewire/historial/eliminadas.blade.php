<div>

    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <div class="h2 float-left">Historial de Ordenes Eliminadas</div> 
                <div class="h2 float-right font-weight-bold text-uppercase"></div>
            </div>


            <div wire:loading.remove wire:target="aplicarFechas">
                <x-historial.lista-eliminadas :datos="$datos" />
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