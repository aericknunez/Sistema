<div class="card">
    <div class="card-body">
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
                  <th scope="col">Mesa</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $orden)

                    <tr @if ($orden->edo == 1)
                        class="red-blue"
                    @endif >
                        <th scope="row">{{ $orden->id }}</th>
                        <td class="text-uppercase"> {{ formatFecha($orden->created_at) }}</td>
                        <td class="text-uppercase">{{ $orden->clientes }}</td>
                        <td class="text-uppercase">{{ tipoServicio($orden->tipo_servicio) }}</td>
                        <td class="text-uppercase"> {{ llevarAqui($orden->llevar_aqui) }}</td>
                        <td class="text-uppercase"> {{ $orden->nombre_mesa }}</td>
                        <td class="text-uppercase">{{ edoOrden($orden->edo) }}</td>
                        <td class="font-weight-bold  text-uppercase">
                          <i class="fas fa-info-circle blue-text fa-sm"></i>
                          <a data-toggle="modal" data-target="#ModalDetallesOrden" wire:click="getDetalles({{ $orden->id }})" title="Ver detalles">{{ dinero(getTotalOrden($orden->id)) }}
                          </a></td>
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