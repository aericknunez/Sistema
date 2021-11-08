<div class="modal" wire:ignore.self id="ModalDetalleProductos" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">DETALLE DE PRODUCTO</h5>

        </div>
        <div class="modal-body">


            @if ($productSelected)

            <table class="table table-sm table-hover table-striped table-round">
                <thead>
                  <tr>
                    <th scope="col" style="width: 1%;">Cant</th>
                    <th scope="col">Producto</th>
                    <th scope="col" style="width: 1%;">Precio</th>
                    <th scope="col" style="width: 1%;">Total</th>
                    <th scope="col" style="width: 1%;">Borrar</th>
                  </tr>
                </thead>
                <tbody>
        
                    @foreach ($productSelected as $producto)      
        
                      <tr class="tventas">
                        <td class="text-center font-weight-bold">{{ $producto->cantidad }}</td>
                        <td class="font-weight-bold">{{ $producto->producto }}</td>
                        <td class="font-weight-bold">{{ $producto->pv }}</td>
                        <td class="font-weight-bold">{{ $producto->total }}</td>
                        <td  class="click">
                            <a wire:click="delProductoDetalle({{ $producto->id }}, {{ $producto->cod }})" wire:loading.attr="disabled">
                                <span><i class="far fa-minus-square red-text fa-lg" aria-hidden="true"></i></span>
                            </a>
                        </td>
                      </tr>
                  
                  @if (count($producto->subOpcion) >= 1)
                    
                      <tr class="topcion">
                        <td colspan="5">
                            @foreach ($producto->subOpcion as $opcion)
                                | {{ $opcion->nombre }}
                            @endforeach
                        </td>
                      </tr>
        
                  @endif
        
                  @endforeach
        
                </tbody>
              </table>
  
            @endif


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-rounded"  data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>