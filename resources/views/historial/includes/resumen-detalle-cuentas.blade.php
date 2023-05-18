<div class="modal" wire:ignore.self id="DetalleCuentas" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">DETALLE DE CUENTAS</h5>

        </div>
        <div class="modal-body">



            <ul class="list-group">
                @foreach ($cuentas as $cuenta)
                 <li class="list-group-item d-flex justify-content-between align-items-center">
                   <span> <span class="font-weight-bold">{{ $cuenta->cuenta }}</span> ({{ $cuenta->banco }})</span>
                    <span class="badge badge-primary badge-pill font-weight-bold px-2 py-2">
                    {{ dinero($cuenta->saldo) }}
                    </span>
                  </li>                   
                @endforeach
            </ul>

            <ul class="list-group mt-3">
               <li class="list-group-item d-flex justify-content-between align-items-center">
                 <span class="font-weight-bold">EFECTIVO DE CAMBIO</span>
                  <span class="badge badge-danger badge-pill font-weight-bold px-2 py-2">
                  {{ dinero($totalEnCajas) }}
                  </span>
                </li>                   
          </ul>


        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary btn-rounded"  data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>