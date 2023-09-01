<div>
    {{-- si multiple pago = 0 muestro el fomulario y no el boton pagar --}}
    @if (!session("config_multiple_pago")  and session('apertura_caja') == 1)
        <div class="border border-primary rounded mt-2 p-2">
          <form wire:submit.prevent="pagar">
            <div class="row">
                <div class="col-12">                
                    <input wire:model="cantidad" id="cantidad" type="number" step="any" class="form-control mt-3" placeholder="0.00">
                </div>
                <div class="col-12 text-center">
                  <button class="btn blue-gradient mt-1 btn-lg" type="submit"><i class="fas fa-coins mr-1"></i> Pagar</button>
                </div>
            </div>
          </form>   
        </div>

    @else


    {{-- para meter el formulario --}}
    @if (session('tipo_pago') == 1  and session('apertura_caja') == 1)
    <form wire:submit.prevent="pagar">
      <div class="row">
          <div class="col-12">                
              <input wire:model="cantidad" id="cantidad" type="number" step="any" class="form-control mt-3" placeholder="0.00">
          </div>
      </div>
    @endif


    <div class="btn-group d-flex mt-3 mb-3" role="group">
        <div class="btn-group" role="group">
            <button id="options-g" type="button" class="btn btn-dark" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-cogs mr-1"></i> Opciones </button>
            <div class="dropdown-menu" aria-labelledby="options-g">
                      
              <a class="dropdown-item" data-toggle="modal" data-target="#ModalPropina"><i class="fas fa-money-bill mr-1"></i>Establecer Propina</a>
              <a class="dropdown-item" data-toggle="modal" data-target="#addClientAsign"><i class="fas fa-user-tag mr-1"></i>Cliente Para Facturar</a>
              

            </div>
          </div>
        

          <button type="button" class="btn btn-success" wire:click="btnImprimirPreCuenta()"> 
            <i class="fas fa-print"></i> Imprimir Orden</button>

      @if (session('apertura_caja') == 1)
 
        @if (session('tipo_pago') == 1 )
            <button class="btn btn-info" type="submit"> <i class="fas fa-coins mr-1"></i> Pagar</button>
          </form>
        @else
          <button type="button" class="btn btn-info" wire:click="pagar()"> <i class="fas fa-coins mr-1"></i> Pagar</button>
        @endif
      
      @endif
           
      </div>

      @endif

</div>