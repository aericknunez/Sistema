  <div class="modal" wire:ignore.self id="EstablecerEnvio" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-sm z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">ESTABLECER PRECIO DE ENVIO</h5>

        </div>
        <div class="modal-body">


<div class="row d-flex justify-content-center">
    <div class="btn-group mt-3 mb-3 justify-content-center" role="group">
      <button id="BtnGroup" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Establecer Envío
      </button>
      <div class="dropdown-menu" aria-labelledby="BtnGroup">
          <a wire:click="btnAddEnvio(0.00)" class="dropdown-item">$0.00</a>
          <a wire:click="btnAddEnvio(0.25)" class="dropdown-item">$0.25</a>
          <a wire:click="btnAddEnvio(0.50)" class="dropdown-item">$0.50</a>
          <a wire:click="btnAddEnvio(0.75)" class="dropdown-item">$0.75</a>
          <a wire:click="btnAddEnvio(1.00)" class="dropdown-item">$1.00</a>
          <a wire:click="btnAddEnvio(1.25)" class="dropdown-item">$1.25</a>
          <a wire:click="btnAddEnvio(1.50)" class="dropdown-item">$1.50</a>
          <a wire:click="btnAddEnvio(1.75)" class="dropdown-item">$1.75</a>
          <a wire:click="btnAddEnvio(2.00)" class="dropdown-item">$2.00</a>
          <a wire:click="btnAddEnvio(2.25)" class="dropdown-item">$2.25</a>
          <a wire:click="btnAddEnvio(2.50)" class="dropdown-item">$2.50</a>
          <a wire:click="btnAddEnvio(2.75)" class="dropdown-item">$2.75</a>
          <a wire:click="btnAddEnvio(3.00)" class="dropdown-item">$3.00</a>
          <a wire:click="btnAddEnvio(3.25)" class="dropdown-item">$3.25</a>
          <a wire:click="btnAddEnvio(3.50)" class="dropdown-item">$3.50</a>
          <a wire:click="btnAddEnvio(3.75)" class="dropdown-item">$3.75</a>
          <a wire:click="btnAddEnvio(4.00)" class="dropdown-item">$4.00</a>
          <a wire:click="btnAddEnvio(4.25)" class="dropdown-item">$4.25</a>
          <a wire:click="btnAddEnvio(4.50)" class="dropdown-item">$4.50</a>
          <a wire:click="btnAddEnvio(4.75)" class="dropdown-item">$4.75</a>
          <a wire:click="btnAddEnvio(5.00)" class="dropdown-item">$5.00</a>
        </div>
    </div>
  </div> 

  <div class="card">
    <div class="card-body text-center">
      <h3>{{ dinero($envio) }}</h3>
    </div>
  </div>

          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-rounded"  data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>