<div>

    @if (count($datos))
  
          
          <div class="table-responsive">
              <table class="table table-sm table-hover table-striped table-round">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Comprobante</th>
                    <th scope="col">Cuenta</th>
                  </tr>
                </thead>
                <tbody>
      
                  @foreach ($datos as $remesa)
  
                      <tr @if ($remesa->edo == 2)
                          class="red-text"
                      @endif >
                          <th scope="row">{{ $remesa->id }}</th>
                          <td class="font-weight-bold text-uppercase">{{ $remesa->nombre }}</td>
                          <td class="font-weight-bold text-uppercase">{{ $remesa->descripcion }}</td>
                          <td class="font-weight-bold text-uppercase"> {{ dinero($remesa->cantidad) }}</td>
                          <td class="font-weight-bold text-uppercase"> {{ $remesa->created_at }}</td>
                          <td class="font-weight-bold text-uppercase"> {{ $remesa->no_comprobante }}</td>
                          <td class="font-weight-bold text-uppercase"> {{ $remesa->banco->banco }}</td>
                      </tr>
                  @endforeach    
      
                </tbody>
            
              </table>
            </div>
      
            @else
  
            <x-globales.no-registros />    
      
            @endif
      
      </div>
      