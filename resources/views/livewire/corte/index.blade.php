<div>
    {{-- Aqui se generara el corte, se ingresara la cantidad de efectivo actual --}}
 
    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Realizar corte</h2> 
                <h2 class="float-right">
                    {{-- <a wire:click="newForm()" class="btn blue-gradient btn-sm"><i class="fas fa-plus"></i> Agregar Categoria</a> --}}
                </h2>
            </div>

@if ($existenMovimientos)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading">Advertencia!</h4>
        <p>Se detecto registros de movimientos de efectivo de caja, si no se toman en cuenta pueden afectar la diferencia del corte </p>
        <div class="text-right">
        <a href="{{ route('efectivo.ingreso') }}" class="alert-link">Ver Movimientos</a>
        </div>
    </div>    
@endif



            @if ($sicorte)

        <div class="row justify-content-center">
            <div class="card col-md-6" wire:loading.remove wire:target="btnCorte">
                <div class="card-body px-lg-5 pt-0" style="color: #757575;">
                    
                    <div class="row justify-content-center mt-2">
                        {{ mensajex('Ingresa la cantidad de efectivo para continuar','info') }}
                    </div>
                {{-- Form  --}}
                    <form wire:submit.prevent="btnCorte">
                        <div class="form-group">
                        <div class="col-xs-2">
                        <label for="ex1" class="active">Efectivo</label>
                        <input type="number" wire:model.defer="cantidad" size="8" maxlength="8" class="form-control" placeholder="0.00" step="any" autofocus>
                        
                        @error('cantidad')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
                    </div>
                    </form>
                {{-- form  --}}
                </div>
            </div>
        </div>



            <div class="row justify-content-center">
                <div  wire:loading wire:target="btnCorte">
                    <img src="{{ asset('img/loading.gif')}}" alt="">
                </div>
            </div>


            @else
            
                <x-corte.resumen :datos="$datos" />

            @endif

        </x-slot>
    
        <x-slot name="lateral">

            @if(!$sicorte)
                <h2 class="h2-responsive">Datos Generales</h2> 

                <ul class="list-group font-weight-bold">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Cajero:
                        <span>{{ $datos->cajero }}</span>
                      </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Apertura:
                      <span>{{ formatFecha($datos->apertura) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Cierre:
                      <span>{{ formatFecha($datos->cierre) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Caja Numero:
                        <span>{{ $datos->numero_caja }}</span>
                    </li>
                </ul>

            <div class="text-center click">
                <a wire:click="imprimirCorte()" class="btn-floating btn-info btn-md mb-3 waves-effect waves-light" title="Imprimir Corte"><i class="fas fa-print"></i></a>
                <a data-toggle="modal" data-target="#modalConfirmDelete"  class="btn-floating btn-danger btn-md mb-3 waves-effect waves-light" title="Eliminar Corte"><i class="fas fa-trash"></i></a>
                <a data-toggle="modal" data-target="#ModalDetallesCorte"  class="btn-floating btn-info btn-md mb-3 waves-effect waves-light" title="Detalles del Corte"><i class="fas fa-info-circle"></i></i></a>
                {{-- <a class="btn-floating btn-info btn-md mb-3 waves-effect waves-light" title="Buscar Credito"><i class="fas fa-print"></i></a> --}}
            </div>


            @endif

        </x-slot>

    </x-cuerpo>

    <x-corte.modal-eliminar-corte />

    <x-historial.modal-detalles-corte :datos="$datos" />




</div>
