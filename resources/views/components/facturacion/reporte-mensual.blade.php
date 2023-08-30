<div class="card">
    <div class="card-body">

        @if ($datos)


            <div class="text-center mb-3 font-weight-bold card">
                <div class="h4 mt-2">{{ $generales['cliente'] }}</div>
                <div>{{ $generales['propietario'] }}, {{ $generales['giro'] }}</div>
                <div>Dirección: {{ $generales['direccion'] }}</div>
                <div>Telefono: {{ $generales['telefono'] }}</div>
                <div>{{ paisDocumento($generales['pais']) }}: {{ $generales['nit'] }}</div>
                <div class="mb-2">{{ paisNombre($generales['pais']) }}</div>
            </div>


        <div class="table-responsive newtable">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">Fecha</th>
                  <th scope="col">Facturas</th>
                  <th scope="col">Fact. Inicial - Fact. Final</th>
                  <th scope="col">Exento</th>
                  <th scope="col">Gravado</th>
                  <th scope="col">Sub Total</th>
                  <th scope="col">ISV. 15%</th>
                  <th scope="col">ISV. 18%</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $data)

                    <tr>
                        <td class="text-uppercase"><a wire:click="imprimirReporte('{{ $data['fechaFormat'] }}')" title="{{ $data['fechaFormat'] }}">{{ $data['fecha'] }}</a></td>
                        <td>{{ $data['facturaCantidad'] }}</td>
                        <td>{{ numeracionFactura($data['facturaInicial']) }} - {{ numeracionFactura($data['facturaFinal']) }}</td>
                        <th>{{ dinero(0) }}</th>
                        {{-- <td>{{ dinero($data['subtotal']) }}</td>
                        <td>{{ dinero($data['subtotal']) }}</td>
                        <td>{{ dinero($data['impuestos']) }}</td> --}}
                        <td>{{ dinero($data['total'] / 1.15) }}</td>
                        <td>{{ dinero($data['total'] / 1.15) }}</td>
                        <td>{{ dinero($data['total'] - ($data['total'] / 1.15)) }}</td>
                        <td>{{ dinero(0) }}</td>
                        <td class="font-weight-bold text-uppercase">{{ dinero($data['total']) }}</td>
                    </tr>
                @endforeach    
   
              </tbody>
          
            </table>
          </div>


          <div class="table-responsive newtable">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">Facturas</th>
                  <th scope="col">Fact. Inicial - Fact. Final</th>
                  <th scope="col">Exento</th>
                  <th scope="col">Gravado</th>
                  <th scope="col">Sub Total</th>
                  <th scope="col">ISV. 15%</th>
                  <th scope="col">ISV. 18%</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($finales as $data)

                    <tr>
                        <td>{{ $data['cantidadMes'] }}</td>
                        <td>{{ numeracionFactura($data['inicialMes']) }} - {{ numeracionFactura($data['finalMes']) }}</td>
                        <th>{{ dinero(0) }}</th>
                        {{-- <td>{{ dinero($data['subtotalMes']) }}</td>
                        <td>{{ dinero($data['subtotalMes']) }}</td>
                        <td>{{ dinero($data['impuestosMes']) }}</td> --}}
                        <td>{{ dinero($data['totalMes'] / 1.15) }}</td>
                        <td>{{ dinero($data['totalMes'] / 1.15) }}</td>
                        <td>{{ dinero($data['totalMes'] - ($data['totalMes'] / 1.15)) }}</td>
                        <td>{{ dinero(0) }}</td>
                        <td class="font-weight-bold text-uppercase">{{ dinero($data['totalMes']) }}</td>
                    </tr>
                @endforeach    
   
              </tbody>
          
            </table>
          </div>


          @if (count($eliminadas))
              
          <div class="h3">Facturas Eliminadas</div>
          <div class="table-responsive newtable">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">Fecha</th>
                  <th scope="col">Factura</th>
                  <th scope="col">Exento</th>
                  <th scope="col">Gravado</th>
                  <th scope="col">Sub Total</th>
                  <th scope="col">ISV. 15%</th>
                  <th scope="col">ISV. 18%</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($eliminadas as $data)

                    <tr>
                        <td><a wire:click="imprimirFactura({{ $data['factura'] }})">{{ formatJustFecha($data['created_at']) }}</a></td>
                        <td>{{ numeracionFactura($data['factura']) }}</td>
                        <th>{{ dinero(0) }}</th>
                        <td>{{ dinero(STotal($data['total'], session('config_impuesto'))) }}</td>
                        <td>{{ dinero(STotal($data['total'], session('config_impuesto'))) }}</td>
                        <td>{{ dinero(Impuesto(STotal($data['total'], session('config_impuesto')), session('config_impuesto'))) }}</td>
                        <td>{{ dinero(0) }}</td>
                        <td class="font-weight-bold text-uppercase">{{ dinero($data['total']) }}</td>
                    </tr>
                @endforeach    
   
              </tbody>
          
            </table>
            <div>TOTAL FACTURAS ELIMINADAS: {{ count($eliminadas)}} </div>
          </div>
          @endif


    
          @else

          <x-globales.no-registros />    
    
          @endif

    </div>
</div>