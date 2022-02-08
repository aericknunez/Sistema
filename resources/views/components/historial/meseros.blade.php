<div class="card">
    <div class="card-body">
      @json($datos)
        @if (count($datos))
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">Orden</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Clientes</th>
                  <th scope="col">Tipo Servicio</th>
                  <th scope="col">LLevar</th>
                  <th scope="col">Mesero</th>
                  <th scope="col">Propina</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                @php $propina = 0; $total = 0; @endphp
                @foreach ($datos as $orden)

                    <tr @if ($orden->edo == 1)
                        class="red-blue"
                    @endif >
                        <th scope="row">{{ $orden->id }}</th>
                        <td class="text-uppercase"> {{ formatFecha($orden->created_at) }}</td>
                        <td class="font-weight-bold text-uppercase">{{ $orden->clientes }}</td>
                        <td class="text-uppercase">{{ tipoServicio($orden->tipo_servicio) }}</td>
                        <td class="text-uppercase"> {{ llevarAqui($orden->llevar_aqui) }}</td>
                        <td class="text-uppercase"> {{ $orden->usuario }}</td>
                        <td class="text-uppercase">
                          @php
                            $propinax = getPropinaOrden($orden->id);
                            $propina = $propina + $propinax;
                          @endphp
                          {{ dinero($propinax) }}</td>
                        <td class="text-uppercase">
                          @php
                            $totalx = getTotalOrden($orden->id);
                            $total = $total + $totalx;
                          @endphp
                          {{ dinero($totalx) }}</td>
                    </tr>
                @endforeach    
    
                <tr>
                  <th scope="row" colspan="5"></th>
                  <td class="font-weight-bold text-uppercase text-right">Total</td>
                  <td class="font-weight-bold text-uppercase">{{ dinero($propina) }}</td>
                  <td class="font-weight-bold text-uppercase">{{ dinero($total) }}</td>
              </tr>

              </tbody>
          
            </table>
          </div>
    
    
          @else

          <x-globales.no-registros />    
    
          @endif

    </div>
</div>