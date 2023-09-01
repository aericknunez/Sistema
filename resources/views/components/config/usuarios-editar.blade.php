<div>

    @if ($datos)
        
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Email</th>
                  <th scope="col">Tipo Usuario</th>
                  <th scope="col">Cambiar</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $usuario)

                    <tr>
                        <td class="font-weight-bold text-uppercase">{{ $usuario->name }}</td>
                        <td> {{ $usuario->email }}</td>
                        <td class="text-uppercase">{{ tipoUsuario($usuario->tipo_usuario) }}</td>
                        <td>
                            <div>
                              @if ($usuario->id == 3)
                              <a title="Cambiar Tipo de Usuario"><i class="fas fa-user fa-2x grey-text mx-2"></i> </a>
                              @else
                              <a data-toggle="modal" data-target="#ModalModUser" wire:click="selectUser({{ $usuario->id }})" title="Cambiar Tipo de Usuario"><i class="fas fa-user fa-2x green-text mx-2"></i> </a>
                              <a title="Inhabilitar" wire:click="$emit('inhabilitar', {{ $usuario->id }})"><i class="fa fa-trash red-text fa-2x"></i></a>
                              @endif
                            </div>
                        </td>
                    </tr>
                @endforeach    
    
              </tbody>
          
            </table>
          </div>
    
        @endif
    
    </div>
    