<div class="card">
    <div class="card-body">
        @if (count($datos))
    
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">Fecha</th>
                  <th scope="col">Documento</th>
                  <th scope="col">Tipo Pago</th>
                  <th scope="col">Factura</th>
                  <th scope="col">Sub Total</th>
                  <th scope="col">Impuestos</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $factura)

                    <tr>
                        <td class="text-uppercase"> {{ formatFecha($factura->created_at) }}</td>
                        <th>{{ tipoVenta($factura->tipo_venta) }}</th>
                        <td class="text-uppercase">{{ tipoPago($factura->tipo_pago) }}</td>
                        <th>{{ $factura->id }}</th>
                        <td>{{ dinero4(STotal($factura->total, session('config_impuesto'))) }}</td>
                        <td> {{ dinero4(Impuesto(STotal($factura->total, session('config_impuesto')), session('config_impuesto'))) }}</td>
                        <td class="font-weight-bold text-uppercase"> {{ dinero($factura->total) }}</td>
                    </tr>
                @endforeach    

                <tr>
                    <td></td>
                    <th></th>
                    <td></td>
                    <th class="font-weight-bold text-uppercase">TOTAL</th>
                    <td class="font-weight-bold text-uppercase">{{ dinero4(STotal(collect($datos)->where('edo', 1)->sum('total'), session('config_impuesto'))) }}</td>
                    <td class="font-weight-bold text-uppercase"> {{ dinero4(Impuesto(STotal(collect($datos)->where('edo', 1)->sum('total'), session('config_impuesto')), session('config_impuesto'))) }}</td>
                    <td class="font-weight-bold text-uppercase"> {{ dinero(collect($datos)->where('edo', 1)->sum('total')) }}</td>
                </tr>
   
              </tbody>
          
            </table>
          </div>
    
          @else

          <x-globales.no-registros />    
    
          @endif

    </div>
</div>