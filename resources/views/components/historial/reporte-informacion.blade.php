<div class="card">
    <div class="card-body">
        @if (count($datos))
    
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Producto</th>
                  <th scope="col">Precio Venta</th>
                  <th scope="col">Descuentos</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $producto)
                    <tr>
                        <th scope="row">{{ $producto->cantidad }}</th>
                        <td><div class="font-weight-bold text-uppercase">{{ $producto->producto }}</div></td>
                        <td>{{ dinero($producto->pv) }}</td>
                        <td>{{ dinero($producto->descuentos) }}</td>
                        <td>{{ dinero($producto->totales) }}</td>
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