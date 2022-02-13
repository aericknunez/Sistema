<div>

    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <div class="h2 float-left">Imprimir Rango de Facturas</div> 
                <div class="h2 float-right font-weight-bold text-uppercase"> 
                    {{-- Total: {{ dinero(collect($datos)->where('edo', 1)->sum('cantidad')) }}                 --}}
                </div>
            </div>



            <div class="card mt-3">
                <form  class="md-form" wire:submit.prevent="aplicarRango">

                <div class="row">
                    <div class="col mx-2">

                           <div class="md-form md-outline input-with-post-icon datepicker">
                            <input wire:model.defer="inicio" type="number" id="inicio" name="inicio" class="form-control">
                            <label for="example">Factura Inicial</label>
                            @error('inicio')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                          </div>



                    </div>
                        
                    <div class="col mx-2">
                            <div class="md-form md-outline input-with-post-icon datepicker">
                            <input wire:model.defer="fin"  type="number" id="fin" name="fin" class="form-control">
                            <label for="example">Factura Final</label>
                            @error('fin')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                          </div>

                    </div>



                </div>

                    <div class="text-right">
                        <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
                    </div>
                </form>

            </div>



        </x-slot>
    
        <x-slot name="lateral">

        </x-slot>

    </x-cuerpo>

</div>