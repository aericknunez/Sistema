<x-principal-layout>

    <x-cuerpo >
        <x-slot name="contenido">
            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Listado de roles disponibles</h2> 
                <h2 class="float-right">
                    <a href="{{ route('roles.create') }}" class="btn blue-gradient btn-sm"><i class="fas fa-plus"></i> Agregar Rol</a>
                </h2>
            </div>

            
            <div>
              @if (session('info'))
              <div class="alert alert-success" role="alert">
                {{ session('info') }}
              </div>
              @endif

                @if (count($roles))
                    
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-striped table-round">
                          <thead>
                            <tr>
                              <th scope="col">Id</th>
                              <th scope="col">Nombre del rol</th>
                              <th scope="col">Eliminar</th>
                            </tr>
                          </thead>
                          <tbody>
                
                            @foreach ($roles as $rol)
            
                                <tr>
            
                                  <td>
                                    {{ $rol->id }}
                                </td>
                                <td>
                                    <div class="font-weight-bold text-uppercase">
                                        {{ $rol->name }}
                                    </div>
                                </td>
                                    
                                    <td>
                                          <form action="{{ route('roles.destroy', $rol) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar </button> 
                                          </form>
                
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
    
                

        </x-slot>
    
        <x-slot name="lateral">
          {{-- @foreach ($permissions as $permision)
            <div>{{ $permision->id }} - {{ $permision->description }}</div>
          @endforeach --}}
        </x-slot>

    </x-cuerpo>

    @push('scripts')

    @endpush

</x-principal-layout>