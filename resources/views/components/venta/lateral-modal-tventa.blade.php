<div class="modal" id="ModalTipoVenta" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">TIPO DE VENTA</h5>

        </div>
        <div class="modal-body">

          <div class="text-center">

            @if (session('impresion_ninguno'))
              <a class="btn btn-elegant" wire:click="btnTipoVenta(0)">Ninguno</a>
            @endif
            @if (session('impresion_ticket'))
              <a class="btn btn-indigo" wire:click="btnTipoVenta(1)">Ticket</a>
            @endif
            @if (session('impresion_factura'))
              <a class="btn btn-cyan" wire:click="btnTipoVenta(2)">Factura</a>
            @endif
            @if (session('impresion_credito_fiscal'))
              <a class="btn btn-brown" wire:click="btnTipoVenta(3)">Credito Fiscal</a>
            @endif
            @if (session('impresion_no_sujeto'))
              <a class="btn btn-blue-grey" wire:click="btnTipoVenta(4)">No Sujeto</a>
            @endif


            <h2 class="mt-2">{{ tipoVenta(session('impresion_seleccionado')) }}</h2>

          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-rounded"  data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>