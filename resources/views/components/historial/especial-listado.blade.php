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
                  <th scope="col">Orden</th>
                  <th scope="col">Usuario</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $producto)
                    <tr>
                        <th scope="row">{{ $producto->cantidad }}</th>
                        <td><div class="font-weight-bold text-uppercase">{{ $producto->producto }}</div></td>
                        <td>{{ dinero($producto->pv) }}</td>
                        <td>{{ $producto->orden }}</td>
                        <td>{{ $producto->usuario }}</td>
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