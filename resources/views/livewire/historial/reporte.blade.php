<div>

    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Historial Diario</h2> 
                <h2 class="float-right"> 
                    {{-- <a data-toggle="modal" data-target="#ModalTransferir" class="btn blue-gradient btn-sm"><i class="fas fa-sync"></i> Transferir</a> --}}
                </h2>
            </div>


            <div wire:loading.remove wire:target="aplicarFechas">
                <x-historial.reporte-informacion :datos="$productos" />
            </div>

            <div class="row justify-content-center">
                <div  wire:loading wire:target="aplicarFechas">
                    <img src="{{ asset('img/loading.gif')}}" alt="">
                </div>
            </div>

        </x-slot>
    
        <x-slot name="lateral">
            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Seleccionar Fecha</h2>
            </div> 


            <div class="card mt-3">
                <form  class="md-form" wire:submit.prevent="aplicarFechas">

                <div class="row">
                    <div class="col mx-2">

                           <div class="md-form md-outline input-with-post-icon datepicker">
                            <input wire:model.defer="fecha1" type="date" id="fecha1" name="fecha1" class="form-control">
                            <label for="example">Seleccione una fecha</label>
                          </div>


                    </div>

                </div>

                    <div class="text-right">
                        <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
                    </div>
                </form>

            </div>

            <small class="my-2"> Fecha seleccionada: {{ $fecha1 }}</small>

        </x-slot>

    </x-cuerpo>

</div>