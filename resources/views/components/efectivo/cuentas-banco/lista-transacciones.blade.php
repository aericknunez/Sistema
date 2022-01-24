<div>

    @if (count($datos))
  
          
          <div class="table-responsive my-3">
              <table class="table table-sm table-hover table-striped table-round">
                <thead>
                  <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Tranferencia</th>
                    <th scope="col">Origen</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Saldo Anterior</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Saldo Actual</th>
                    <th scope="col">Usuario</th>
                  </tr>
                </thead>
                <tbody>
      
                  @foreach ($datos as $transfer)
  
                      <tr>
                          <td class="text-uppercase"> {{ formatFecha($transfer->created_at) }}</td>
                          <td scope="row">{{ $transfer->transferencia }}</td>
                          <td class="text-uppercase">{{ $transfer->origen }}</td>
                          <td class="text-uppercase">{{ $transfer->destino }}</td>
                          <td class="text-uppercase"> {{ dinero($transfer->saldo_destino_anterior) }}</td>
                          <td class="font-weight-bold text-uppercase"> {{ dinero($transfer->cantidad) }}</td>
                          <td class="font-weight-bold text-uppercase red-text"> {{ dinero($transfer->saldo_destino) }}</td>
                          <td class="text-uppercase">{{ $transfer->usuario }}</td>
                      </tr>
                  @endforeach    
      
                </tbody>
            
              </table>
            </div>
      
    @else

        <x-globales.no-registros />    

    @endif
      
</div>
      