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
                  <th scope="col">{{ paisDocumento(session('config_pais')) }}</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $cliente)

                    <tr>
                        <th scope="row">{{ $cliente->id }}</th>
                        <td class="font-weight-bold text-uppercase">{{ $cliente->nombre }}</td>
                        <td class="text-uppercase">{{ $cliente->direccion }}</td>
                        <td class="font-weight-bold text-uppercase"> {{ $cliente->telefono }}</td>
                        <td> {{ $cliente->email }}</td>
                        <td class="text-uppercase">{{ $cliente->documento }}</td>
                        <td>
                            <div>
                                <a wire:click="selectClient({{ $cliente->id }})" data-toggle="modal" data-target="#ModalAddCliente" class="mr-2"><i class="fas fa-edit fa-2x green-text"></i></a>
                                <a wire:click="$emit('deleteCliente', {{ $cliente->id }})"><i class="fas fa-trash fa-2x red-text"></i> </a>
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
    