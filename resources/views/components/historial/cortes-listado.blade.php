<div class="card">
    <div class="card-body">
        @if (count($datos))
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">Apertura</th>
                  <th scope="col">Cierre</th>
                  <th scope="col">Efectivo Inicial</th>
                  <th scope="col">Efectivo Final</th>
                  <th scope="col">Total Venta</th>
                  <th scope="col">Gastos</th>
                  <th scope="col">Remesas</th>
                  <th scope="col">Diferencia</th>
                  <th scope="col">Estado</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $corte)

                    <tr @if ($corte->edo == 0)
                        class="red-text"
                        @elseif ($corte->edo == 1)
                        class="blue-text"
                        @endif >
                        <td>{{ formatFecha($corte->apertura) }}</td>
                        <td>{{ formatFecha($corte->cierre) }}</td>
                        <td>{{ dinero($corte->efectivo_inicial) }}</td>
                        <td> {{ dinero($corte->efectivo_final) }}</td>
                        <td> {{ dinero($corte->total_venta) }}</td>
                        <td> {{ dinero($corte->gastos) }}</td>
                        <td> {{ dinero($corte->remesas) }}</td>
                        <td> {{ dinero($corte->diferencia) }}</td>
                        <td> 
                          @if ($corte->edo == 1)
                             {{ edoCorte($corte->edo) }}
                          @else
                            <a wire:click="obtenerDatosCorte({{ $corte->id }})" data-toggle="modal" data-target="#ModalDetallesCorte">{{ edoCorte($corte->edo) }} </a>  
                          @endif
                        </td>
                    </tr>
                @endforeach    
                
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td class="font-weight-bold text-uppercase text-right"> Total</td>
                  <td class="font-weight-bold text-uppercase"> {{ dinero(collect($datos)->where('edo', 2)->sum('total_venta')) }}</td>
                  <td class="font-weight-bold text-uppercase"> {{ dinero(collect($datos)->where('edo', 2)->sum('gastos')) }}</td>
                  <td class="font-weight-bold text-uppercase"> {{ dinero(collect($datos)->where('edo', 2)->sum('remesas')) }}</td>
                  <td class="font-weight-bold text-uppercase"> {{ dinero(collect($datos)->where('edo', 2)->sum('diferencia')) }}</td>
                  <td></td>
              </tr>

              </tbody>
          
            </table>
          </div>
    
          @else

          <x-globales.no-registros />    
    
          @endif

    </div>
</div>