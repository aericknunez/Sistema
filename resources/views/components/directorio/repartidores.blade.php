<div>

    @if (count($datos))
        
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Dirección</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">Email</th>
                  <th scope="col">Documento</th>
                  <th scope="col">Eliminar</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $repartidor)

                    <tr>
                        <th scope="row">{{ $repartidor->id }}</th>
                        <td class="font-weight-bold text-uppercase">{{ $repartidor->nombre }}</td>
                        <td class="text-uppercase">{{ $repartidor->direccion }}</td>
                        <td class="font-weight-bold text-uppercase"> {{ $repartidor->telefono }}</td>
                        <td> {{ $repartidor->email }}</td>
                        <td class="text-uppercase">{{ $repartidor->documento }}</td>
                        <td>
                            <div>
                              <a wire:click="selectRepartidor({{ $repartidor->id }})" data-toggle="modal" data-target="#ModalAddRepartidor" class="mr-2"><i class="fas fa-edit fa-2x green-text"></i></a>

                                <a wire:click="$emit('deleteRepartidor', {{ $repartidor->id }})" ><i class="fas fa-trash fa-2x red-text"></i> </a>
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
    