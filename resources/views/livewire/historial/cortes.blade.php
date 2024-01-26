<div>

    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Historial de Cortes</h2> 
                <h2 class="float-right"> 
                    {{-- <a data-toggle="modal" data-target="#ModalTransferir" class="btn btn-secondary btn-sm"><i class="fas fa-sync"></i> Transferir</a> --}}
                </h2>
            </div>


            <div wire:loading.remove wire:target="aplicarFechas">
                <x-historial.cortes-listado :datos="$datos" />
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

            <div class="card mt-3">
                <form  class="md-form" wire:submit.prevent="aplicarFechas">

                <div class="row">
                    <div class="col mx-2">

                           <div class="md-form md-outline input-with-post-icon datepicker">
                            <input wire:model.defer="fecha1f" type="date" id="fecha1" name="fecha1" class="form-control">
                            <label for="example">Seleccione una fecha</label>
                          </div>


                    </div>

                    <div class="col mx-2">
                            <div class="md-form md-outline input-with-post-icon datepicker">
                            <input wire:model.defer="fecha2f"  type="date" id="fecha2" name="fecha2" class="form-control">
                            <label for="example">Seleccione una fecha</label>
                          </div>
                    </div>


                </div>

                    <div class="text-right">
                        <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
                    </div>
                </form>

            </div>


            <small class="my-2"> Fecha desde : {{ formatFecha($fecha1) }} hasta: {{ formatFecha($fecha2) }}</small>


          {{-- Fecha1:  {{ $fecha1 }}
          Fecha2:   {{ $fecha2 }} --}}
        </x-slot>

    </x-cuerpo>


    <x-historial.modal-detalles-corte :datos="$detalles" />

</div>