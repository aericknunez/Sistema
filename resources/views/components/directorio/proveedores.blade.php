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
                  <th scope="col">Contacto</th>
                  <th scope="col">Tel Contacto</th>
                  <th scope="col">{{ paisDocumento(session('config_pais')) }}</th>
                  <th scope="col">Eliminar</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $proveedor)

                    <tr>
                        <th scope="row">{{ $proveedor->id }}</th>
                        <td class="font-weight-bold text-uppercase">{{ $proveedor->nombre }}</td>
                        <td class="text-uppercase">{{ $proveedor->direccion }}</td>
                        <td class="font-weight-bold text-uppercase"> {{ $proveedor->telefono }}</td>
                        <td> {{ $proveedor->contacto }}</td>
                        <td> {{ $proveedor->telefono_contacto }}</td>
                        <td class="text-uppercase">{{ $proveedor->documento }}</td>
                        <td>
                            <div>
                              <a wire:click="selectProveedor({{ $proveedor->id }})" data-toggle="modal" data-target="#ModalAddProveedor" class="mr-2"><i class="fas fa-edit fa-2x green-text"></i></a>

                                <a wire:click="$emit('deleteProveedor', {{ $proveedor->id }})" ><i class="fas fa-trash fa-2x red-text"></i> </a>
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
    