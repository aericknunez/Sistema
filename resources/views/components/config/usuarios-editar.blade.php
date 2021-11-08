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
                                <a data-toggle="modal" data-target="#ModalModUser" wire:click="selectUser({{ $usuario->id }})" class="btn btn-success btn-sm"><i class="fas fa-user"></i> Cambiar </a>
                            </div>
                        </td>
                    </tr>
                @endforeach    
    
              </tbody>
          
            </table>
          </div>
    
        @endif
    
    </div>
    