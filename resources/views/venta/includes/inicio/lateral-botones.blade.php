<div>
    {{-- si multiple pago = 0 muestro el fomulario y no el boton pagar --}}
    @if (!session("config_multiple_pago") and session('apertura_caja') == 1)
        <div class="border border-primary rounded mt-2 p-2">
          <form wire:submit.prevent="pagar">
            <div class="row">
                <div class="col-12">                
                    <input wire:model="cantidad" id="cantidad" type="number" step="any" class="form-control mt-3" placeholder="0.00">
                </div>
                <div class="col-12 text-center">
                  <button class="btn btn-secondary mt-1 btn-lg" type="submit"><i class="fas fa-coins mr-1"></i> Pagar</button>
                </div>
            </div>
          </form>   
        </div>

    @else


    {{-- para meter el formulario --}}
    @if ((session('tipo_pago') == 1 or session('tipo_pago') == 7) and session('apertura_caja') == 1)
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
              
            @if (session('impresion_imprimir_antes'))
              <a class="dropdown-item" wire:click="btnImprimirPreCuenta()"><i class="fas fa-print mr-1"></i>Imprimir Pre Cuenta</a>
            @endif
        
            <a class="dropdown-item" data-toggle="modal" data-target="#ModalPropina"><i class="fas fa-money-bill mr-1"></i>Establecer Propina</a>
            <a class="dropdown-item" data-toggle="modal" data-target="#addClientAsign"><i class="fas fa-user-tag mr-1"></i>Cliente Para Facturar</a>
              
            @if (session('principal_comentarios_comanda'))
              <a class="dropdown-item" data-toggle="modal" data-target="#ModalComentario"><i class="fas fa-comment mr-1"></i>Agregar Comentario</a>
            @endif

            @if (session('config_tipo_servicio') == 2)
            <a class="dropdown-item" data-toggle="modal" data-target="#ModalNombre"><i class="fas fa-user mr-1"></i>Agregar Nombre</a>
            <a href="{{ route('venta.cambios') }}" class="dropdown-item"><i class="fas fa-divide mr-1"></i>Dividir Cuenta</a>
            <a data-toggle="modal" data-target="#ModalAddCliente" class="dropdown-item"><i class="fas fa-user mr-1"></i>Agregar Cliente</a>
            @endif

            @if (session('config_tipo_servicio') == 3)
            <a class="dropdown-item" data-toggle="modal" data-target="#EstablecerEnvio"><i class="fas fa-dollar-sign mr-1"></i>Establecer Envio</a>
            <a class="dropdown-item" wire:click="btnEnvio()"><i class="fas fa-dollar-sign mr-1"></i>Agregar Cuota Envio</a>
            @endif

            </div>
          </div>
        
        @if (session('principal_ticket_pantalla'))
        <button type="button" class="btn btn-success" wire:click="btnGuardar()" wire:loading.remove wire:target="btnGuardar"> 
          <i class="fas fa-save mr-1"></i>Guardar</button>

          <button type="button" class="btn btn-danger" wire:loading wire:target="btnGuardar"> 
            <i class="fas fa-sync fa-spin"></i>Guardar</button>
        @endif
 
        @if (session('apertura_caja') == 1)
          
            @if (session('tipo_pago') == 1)
                <button class="btn btn-info" type="submit"> <i class="fas fa-coins mr-1"></i> Pagar</button>
              </form>
            @else
              <button type="button" class="btn btn-info" wire:click="pagar()"
              @if (session('tipo_pago') == 5 && !session('factura_documento'))
              disabled
              @endif
            > <i class="fas fa-coins mr-1"></i> Pagar </button>
            @endif

        @endif

           
      </div>

      @endif

</div>