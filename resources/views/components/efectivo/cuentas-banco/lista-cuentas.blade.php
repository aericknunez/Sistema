<div>

    
    @if ($datos)
        
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tipo</th>
                  <th scope="col">Numero Cuenta</th>
                  <th scope="col">Banco</th>
                  <th scope="col">Saldo</th>
                  <th scope="col">Eliminar</th>
                </tr>
              </thead>
              <tbody>
    
                @foreach ($datos as $cuenta)

                    <tr>
                        <th scope="row">{{ $cuenta->id }}</th>
                        <td class="font-weight-bold text-uppercase">{{ tipoCuenta($cuenta->tipo) }}</td>
                        <td class="font-weight-bold text-uppercase">{{ $cuenta->cuenta }}</td>
                        <td class="font-weight-bold text-uppercase"> {{ $cuenta->banco }}</td>
                        <td class="font-weight-bold text-uppercase"> {{ dinero($cuenta->saldo) }}</td>
                        <td>
                            <div>
                              {{-- <a wire:click="editar({{ $producto->id }})" class="btn btn-mdb-color btn-sm"><i class="fas fa-file-signature"></i> Modificar</a> --}}
                            <a wire:click="$emit('deleteBanco', {{ $cuenta->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar </a>
                            </div>
                        </td>
                    </tr>
                @endforeach    
    
              </tbody>
          
            </table>
          </div>
    
        @endif
    
    </div>
    