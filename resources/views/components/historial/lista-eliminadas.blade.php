<div class="card">
    <div class="card-body">
        @if (count($datos))
    
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">Orden</th>
                  <th scope="col">Cant</th>
                  <th scope="col">Producto</th>
                  <th scope="col">Total</th>
                  <th scope="col">Usuario</th>
                  <th scope="col">Usuario Elimina</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Causa Eliminado</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $producto)
                    <tr class="{{ getColor($producto->orden) }}">
                        <th scope="row">{{ $producto->orden }}</th>
                        <th scope="row">{{ $producto->cantidad }}</th>
                        <td><div class="font-weight-bold text-uppercase">{{ $producto->producto }}</div></td>
                        <td>{{ dinero($producto->total) }}</td>
                        <td>{{ $producto->user }}</td>
                        <td>{{ $producto->user_borrado }}</td>
                        <td>{{ formatFecha($producto->updated_at) }}</td>
                        <td>{{ $producto->motivo_borrado }}</td>
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