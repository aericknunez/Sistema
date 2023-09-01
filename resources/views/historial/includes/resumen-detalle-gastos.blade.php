<div class="modal" wire:ignore.self id="DetalleGastos" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">DETALLE DE GASTOS</h5>

        </div>
        <div class="modal-body">


          {{-- @json($detalleGastos) --}}

          <div class="card">
            <div class="card-body">
                @if (count($detalleGastos))
            
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-striped table-round">
                      <thead>
                        <tr>
                          <th scope="col">Nombre</th>
                          <th scope="col">Descripcion</th>
                          <th scope="col">Cantidad</th>
                          {{-- <th scope="col">Cuenta</th> --}}
                        </tr>
                      </thead>
                      <tbody>
            
                        @foreach ($detalleGastos as $gasto)
        
                            <tr @if ($gasto->edo == 2)
                                class="red-text"
                            @endif >
                                <td class="font-weight-bold text-uppercase" data-toggle="tooltip" data-html="true"
                                title="Usuario: {{ $gasto->usuario }}">{{ $gasto->nombre }}</td>
                                <td class="text-uppercase">{{ $gasto->descripcion }}</td>
                                <td class="font-weight-bold text-uppercase"> {{ dinero($gasto->cantidad) }}</td>
                                {{-- <td class="text-uppercase"> @if ($gasto->banco)
                                    {{ $gasto->banco->banco }}
                                @else
                                    Caja Actual
                                @endif </td> --}}
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

        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary btn-rounded"  data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>