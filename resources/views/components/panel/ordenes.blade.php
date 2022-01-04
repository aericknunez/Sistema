<div class="card">
    <div class="card-body">
        @if (count($datos))
        {{-- @json($datos) --}}
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">Orden</th>
                  <th scope="col">Clientes</th>
                  <th scope="col">Atiende</th>
                  <th scope="col">Tipo Servicio</th>
                  <th scope="col">LLevar</th>
                  <th scope="col">Mesa</th>
                  <th scope="col">Estado</th>
                  {{-- <th scope="col">Propina</th>
                  <th scope="col">Total</th> --}}
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $orden)

                    <tr @if ($orden->edo == 1)
                        class="red-blue"
                    @endif >
                        <th scope="row">{{ $orden->id }}</th>
                        <td class="font-weight-bold text-uppercase">{{ $orden->clientes }}</td>
                        <td class="font-weight-bold text-uppercase">{{ $orden->usuario }}</td>
                        <td class="text-uppercase">{{ tipoServicio($orden->tipo_servicio) }}</td>
                        <td class="text-uppercase"> {{ llevarAqui($orden->llevar_aqui) }}</td>
                        <td class="text-uppercase"> {{ $orden->nombre_mesa }}</td>
                        <td class="text-uppercase"> @if ($orden->edo == 1)
                                                    <a wire:click="selectOrden({{ $orden->id }}, {{ $orden->tipo_servicio }})" ><span class="badge badge-pill badge-danger">Pendiente</span></a>
                                                    @elseif ($orden->edo == 2)
                                                    <span class="badge badge-pill badge-success">Pagado</span>
                                                    @else
                                                    <span class="badge badge-pill badge-danger">Eliminado</span>
                                                    @endif   </td>
                        {{-- <td class="text-uppercase">{{ dinero($orden->total_propina) }}</td>
                        <td class="font-weight-bold text-uppercase">{{ dinero($orden->total_factura) }}</td> --}}
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