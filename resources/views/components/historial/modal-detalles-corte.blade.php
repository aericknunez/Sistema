<div class="modal" wire:ignore.self id="ModalDetallesCorte" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-lg z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">DETALLES DEL CORTE</h5>

        </div>
        <div class="modal-body">


            <div class="card" >
                <div class="card-body px-lg-5 pt-0" style="color: #757575;">
                {{-- informacion  --}}
                @if ($datos)
                <div class="text-center">
                    <div class="h3-responsive">Cajero: {{ $datos->cajero }}</div>
                    <div class="h3-responsive">Numero de Caja: {{ $datos->numero_caja }}</div>
                    @if ($datos->edo == 0)
                    <div class="h3-responsive red-text bordeado-x1 border">{{ edoCorte($datos->edo) }}</div>
                    @else
                    <div class="h3-responsive green-text bordeado-x1 border">{{ edoCorte($datos->edo) }}</div>    
                    @endif
                    <div class="h6-responsive">Apertura: {{ formatFecha($datos->apertura) }}</div>
                    <div class="h6-responsive">Cierre: {{ formatFecha($datos->cierre) }}</div>

                    <div class="h6-responsive mt-3 mb-3">Ordenes: {{ $datos->ordenes }} || Productos: {{ $datos->productos }} || Clientes: {{ $datos->clientes }}</div>
                </div>

                <div class="row">
                    <div class="col-8 h4-responsive">Efectivo Apertura: </div>
                    <div class="col-4 h4-responsive">{{ dinero($datos->efectivo_inicial) }}</div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-8 h4-responsive">Total Efectivo: </div>
                    <div class="col-4 h4-responsive">{{ dinero($datos->total_efectivo) }}</div>
                </div>
                <div class="row">
                    <div class="col-8 h4-responsive">Total Tarjeta: </div>
                    <div class="col-4 h4-responsive">{{ dinero($datos->total_tarjeta) }}</div>
                </div>
                <div class="row">
                    <div class="col-8 h4-responsive">Total de Venta: </div>
                    <div class="col-4 h4-responsive">{{ dinero($datos->total_venta) }}</div>
                </div>
                <hr>
                @if ($datos->propina_efectivo)                    
                <div class="row">
                    <div class="col-8 h4-responsive">Propina Efectivo: </div>
                    <div class="col-4 h4-responsive">{{ dinero($datos->propina_efectivo) }}</div>
                </div>
                @endif
                @if ($datos->propina_no_efectivo)                    
                <div class="row">
                    <div class="col-8 h4-responsive">Propina NO Efectivo: </div>
                    <div class="col-4 h4-responsive">{{ dinero($datos->propina_no_efectivo) }}</div>
                </div>
                @endif
                @if ($datos->propina_efectivo or $datos->propina_no_efectivo)                    
                <hr>
                @endif
                @if ($datos->gastos)                    
                <div class="row">
                    <div class="col-8 h4-responsive">Total de Gastos: </div>
                    <div class="col-4 h4-responsive">{{ dinero($datos->gastos) }}</div>
                </div>
                @endif
                @if ($datos->remesas)                    
                <div class="row">
                    <div class="col-8 h4-responsive">Total de Remesas: </div>
                    <div class="col-4 h4-responsive">{{ dinero($datos->remesas) }}</div>
                </div>
                @endif
                @if ($datos->abonos)                    
                <div class="row">
                    <div class="col-8 h4-responsive">Total de Abonos: </div>
                    <div class="col-4 h4-responsive">{{ dinero($datos->abonos) }}</div>
                </div>
                @endif
                @if ($datos->gastos or $datos->remesas or $datos->abonos)                    
                <hr>
                @endif
                @if ($datos->efectivo_ingresado)                    
                <div class="row">
                    <div class="col-8 h4-responsive">Efectivo Ingresado: </div>
                    <div class="col-4 h4-responsive">{{ dinero($datos->efectivo_ingresado) }}</div>
                </div>
                @endif
                @if ($datos->efectivo_retirado)                    
                <div class="row">
                    <div class="col-8 h4-responsive">Efectivo Retirado: </div>
                    <div class="col-4 h4-responsive">{{ dinero($datos->efectivo_retirado) }}</div>
                </div>
                @endif
                <div class="row green-text bordeado-x1 border">
                    <div class="col-8 h4-responsive">Efectivo de Corte: </div>
                    <div class="col-4 h4-responsive">{{ dinero($datos->efectivo_final) }}</div>
                </div>
                <div class="row red-text bordeado-x1 border">
                    <div class="col-8 h4-responsive">Diferencia de Efectivo: </div>
                    <div class="col-4 h4-responsive">{{ dinero($datos->diferencia) }}</div>
                </div>
                @endif
                {{-- info  --}}
                </div>
            </div>
            
   
        </div>
        <div class="modal-footer">
          <button wire:click="imprimirCorte()" class="btn btn-danger btn-rounded btn-sm"">Imprimir</button>
          <button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>