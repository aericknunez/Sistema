<div>

    @if (count($datos))
  
          
          <div class="table-responsive">
              <table class="table table-sm table-hover table-striped table-round">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Movimiento</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Tipo Pago</th>
                    <th scope="col">Cuenta</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
      
                  @foreach ($datos as $entrada)
  
                      <tr @if ($entrada->edo == 2)
                          class="red-text"
                      @endif >
                          <th scope="row">{{ $entrada->id }}</th>
                         @if ($entrada->tipo_movimiento == 1)
                            <td class="font-weight-bold text-uppercase green-text">Entrada</td>
                         @else
                            <td class="font-weight-bold text-uppercase red-text">Salida</td>
                          @endif
                          <td class="font-weight-bold text-uppercase">{{ $entrada->descripcion }}</td>
                          <td class="font-weight-bold text-uppercase"> {{ dinero($entrada->cantidad) }}</td>
                          <td class="font-weight-bold text-uppercase"> {{ $entrada->created_at }}</td>
                          <td class="font-weight-bold text-uppercase"> {{ tipoPago($entrada->tipo_pago) }}</td>
                          <td class="font-weight-bold text-uppercase">@if ($entrada->banco)
                                                                            {{ $entrada->banco->banco }}
                                                                        @else
                                                                        N/A
                                                                        @endif </td>
                          <td>
                              <div>
                              @if ($entrada->edo == 1)
                                  <a wire:click="$emit('deleteEntrada', {{ $entrada->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar </a>
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
      