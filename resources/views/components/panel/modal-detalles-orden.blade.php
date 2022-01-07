<div class="modal" wire:ignore.self id="ModalDetallesOrden" tabindex="-1" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">DETALLES DE LA ORDEN</h5>

        </div>
        <div class="modal-body">


            <div class="card" >
                <div class="card-body px-lg-5 pt-0">
                
                @if ($datos)
                    
                <div class="mt-3">
                    
                    <div class="h4-responsive"># {{$datos['orden']['id']}} Usuario: {{$datos['orden']['usuario']}}</div>

                    <div class="bordeado-x1 border mb-2">
                        <span class="mx-2">Inicio {{ formatFecha($datos['orden']['created_at']) }}</span>
                        @if ($datos['orden']['created_at'])
                        <span class="mx-2 red-text">Hace: {{ $datos['orden']['created_at']->diffForHumans(now()) }}</span>
                        @endif
                    </div>

                    <x-venta.cambios-productos-cliente :datos="$datos['productos']" />

                    <div class="row">
                        <div class="col-6 h4-responsive text-right danger"></div>
                        <div class="col-6 h4-responsive text-right danger">Total: {{ dinero(collect($datos['productos'])->where('edo', 1)->sum('total')) }}</div>
                    </div>
                </div>

                <div class="mt-2">
                    @if (count($datos['facturas']))
                    <small>Detalle de Facturas de esta orden</small>
                        
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-striped table-round">
                          <thead>
                            <tr>
                              <th scope="col">Factura</th>
                              <th scope="col">Documento</th>
                              <th scope="col">Pago</th>
                              <th scope="col">Propina</th>
                              <th scope="col">Total</th>
                            </tr>
                          </thead>
                          <tbody>
                
                            @foreach ($datos['facturas'] as $factura)
            
                                <tr >
                                    <td>{{ $factura->factura }}</td>
                                    <td>{{ tipoVenta($factura->tipo_venta) }}</td>
                                    <td>{{ tipoPago($factura->tipo_pago) }}</td>
                                    <td> {{ dinero($factura->propina) }}</td>
                                    <td> {{ dinero($factura->total) }}</td>
                                </tr>
                            @endforeach    
                
                          </tbody>
                      
                        </table>
                      </div>

                    @endif
                </div>


                <div>
                    @if ($datos['orden']['nombre_mesa'])
                      <div> Orden: {{$datos['orden']['nombre_mesa']}} </div>
                    @endif
                    @if ($datos['orden']['comentario'])
                      <div> Comentarios: {{$datos['orden']['comentario']}} </div>
                    @endif
                    @if ($datos['orden']['llevar_aqui'])
                      <div class="font-weight-bold text-uppercase"> {{ llevarAqui($datos['orden']['llevar_aqui']) }} </div>
                    @endif
                </div>
                
              <small class="red-text">* La Propina no se esta tomando en cuenta en el total</small>
              

                @endif


                </div>
            </div>
        
   
        </div>
        <div class="modal-footer">
          <button wire:click="cerrarModal()" type="button" class="btn btn-primary btn-rounded" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>