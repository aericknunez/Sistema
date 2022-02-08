<div>

    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Historial de Ventas Por Mesero</h2> 
                <h2 class="float-right"> 
                    {{-- <a data-toggle="modal" data-target="#ModalTransferir" class="btn blue-gradient btn-sm"><i class="fas fa-sync"></i> Transferir</a> --}}
                </h2>
            </div>


            <div wire:loading.remove wire:target="aplicarFechas">
                <x-historial.meseros :datos="$datos" />
            </div>

            <div class="row justify-content-center">
                <div  wire:loading wire:target="aplicarFechas">
                    <img src="{{ asset('img/loading.gif')}}" alt="">
                </div>
            </div>

        </x-slot>
    
        <x-slot name="lateral">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Seleccionar Fechas</h2>
            </div> 

            <div class="card">
                <div class="card-body">
                    <div class="col">
                        <select class="browser-default custom-select" wire:model.defer="tipo_fecha">
                            <option value="1" selected >Fecha Unica</option>
                            <option value="2">Rango de Fechas</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card  mt-3">
                <div class="card-body">
                    <div class="col">
                        <small>Usuario</small>
                        <select class="browser-default custom-select" wire:model.defer="usuario">
                            @foreach ($usuarios as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
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

          {{-- Fecha1:  {{ $fecha1 }}
          Fecha2:   {{ $fecha2 }} --}}
        </x-slot>

    </x-cuerpo>

</div>