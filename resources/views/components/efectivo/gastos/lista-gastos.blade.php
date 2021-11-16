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
                  <th scope="col">Tipo Pago</th>
                  <th scope="col">Cuenta</th>
                  <th scope="col">Eliminar</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $gasto)

                    <tr @if ($gasto->edo == 2)
                        class="red-text"
                    @endif >
                        <th scope="row">{{ $gasto->id }}</th>
                        <td class="font-weight-bold text-uppercase">{{ $gasto->nombre }}</td>
                        <td class="text-uppercase">{{ $gasto->descripcion }}</td>
                        <td class="font-weight-bold text-uppercase"> {{ dinero($gasto->cantidad) }}</td>
                        <td class="text-uppercase"> {{ formatFecha($gasto->fecha) }}</td>
                        <td class="text-uppercase"> {{ tipoPago($gasto->tipo_pago) }}</td>
                        <td class="text-uppercase"> @if ($gasto->banco)
                            {{ $gasto->banco->banco }}
                        @else
                            Caja Actual
                        @endif </td>
                        <td>
                            <div>
                            @if ($gasto->edo == 1)
                                <a wire:click="$emit('deleteGasto', {{ $gasto->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar </a>
                            @else
                                <a class="btn btn-danger btn-sm disabled"><i class="fas fa-trash"></i> Eliminar </a>
                            @endif
                            </div>
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
    