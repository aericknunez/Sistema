<div class="card">
    <div class="card-body">
        @if (count($datos))
    
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">Fecha</th>
                  <th scope="col">Documento</th>
                  <th scope="col">Factura</th>
                  <th scope="col">Sub Total</th>
                  <th scope="col">Impuestos</th>
                  <th scope="col">Total</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $factura)

                    <tr>
                        <td class="text-uppercase"> {{ formatFecha($factura->created_at) }}</td>
                        <th>{{ tipoVenta($factura->tipo_venta) }}</th>
                        <th>{{ $factura->factura }}</th>
                        <td>{{ dinero4(STotal($factura->total, session('config_impuesto'))) }}</td>
                        <td> {{ dinero4(Impuesto(STotal($factura->total, session('config_impuesto')), session('config_impuesto'))) }}</td>
                        <td class="font-weight-bold text-uppercase"> {{ dinero($factura->total) }}</td>
                        <td>
                          @if ($loop->first)
                          <a wire:click="$emit('deleteFactura', {{ $factura->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar </a>
                          @endif
                          </td>
                    </tr>
                @endforeach 
   
              </tbody>
          
            </table>
          </div>
    
          @else

          <x-globales.no-registros />    
    
          @endif

    </div>
</div>