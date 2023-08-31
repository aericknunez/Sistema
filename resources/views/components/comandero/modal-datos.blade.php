<div class="modal" wire:ignore.self id="ModalDatos" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">DATOS GENERALES</h5>

        </div>
        <div class="modal-body">


            <div class="card my-3 mx-3">
                <small class="ml-3 mt-2">Total de Ordenes</small>
                <div class="h2-responsive text-center mx-3 "><div class="float-left">Ordenes Pendienes:</div> <div class="float-right">{{ $ordenes }}</div></div>
                <div class="h2-responsive text-center mx-3 "><div class="float-left">Cantidad de Clientes:</div> <div class="float-right">{{ $clientes }}</div></div>
            </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn @if (config('sistema.latam') == true)
          btn-dark
          @else
          btn-primary
          @endif btn-rounded"  data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>