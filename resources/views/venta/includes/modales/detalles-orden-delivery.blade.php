<div class="modal" wire:ignore.self id="DetallesOrdenDelivery" tabindex="-1" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">DETALLES DE LA ORDEN</h5>

        </div>
        <div class="modal-body">


            <div class="card" >
                <div class="card-body px-lg-5 pt-0">
                
                {{-- {{ $datos }} --}}

                @if ($ordenDetalles)

                    
                <div class="mt-3">
                    
                    <div class="h4-responsive"># {{$ordenDetalles['id']}} Usuario: {{$ordenDetalles['usuario']}}</div>

                    <div class="bordeado-x1 border mb-2">
                        <span class="mx-2">Inicio {{ formatFecha($ordenDetalles['created_at']) }}</span>
                        @if ($ordenDetalles['created_at'])
                        <span class="mx-2 red-text">Hace: {{ $ordenDetalles['created_at']->diffForHumans(now()) }}</span>
                        @endif
                    </div>

                    @php
                        $productosFactura = $ordenDetalles['productos'];
                    @endphp
                    @include('venta.includes.cambios.productos-cliente')

                    <div class="row">
                        <div class="col-6 h4-responsive text-right danger"></div>
                        <div class="col-6 h4-responsive text-right danger">Total: {{ dinero(collect($ordenDetalles['productos'])->where('edo', 1)->sum('total')) }}</div>
                    </div>
                </div>


                <div>
                    @if ($ordenDetalles['nombre_mesa'])
                      <div> Orden: {{$datos['nombre_mesa']}} </div>
                    @endif
                    @if ($ordenDetalles['comentario'])
                      <div> Comentarios: {{$ordenDetalles['comentario']}} </div>
                    @endif
                    @if ($ordenDetalles['llevar_aqui'])
                      <div class="font-weight-bold text-uppercase"> {{ llevarAqui($ordenDetalles['llevar_aqui']) }} </div>
                    @endif
                </div>
                
              <small class="red-text">* La Propina no se esta tomando en cuenta en el total</small>
              

              <div class="font-weight-bold text-uppercase bordeado-x1 border my-2 px-2"> DATOS DEL CLIENTE </div>
              <div class="row"><div class="text-uppercase font-weight-bold">Nombre: </div> <div class="ml-2"> {{ $ordenDetalles->deliverys->cliente->nombre }}</div></div>
              <div class="row"><div class="text-uppercase font-weight-bold">Dirección: </div> <div class="ml-2"> {{ $ordenDetalles->deliverys->cliente->direccion }}</div></div>
              <div class="row"><div class="text-uppercase font-weight-bold">Telefono: </div> <div class="ml-2"> {{ $ordenDetalles->deliverys->cliente->telefono }}</div></div>


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