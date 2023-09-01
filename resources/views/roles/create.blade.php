<x-principal-layout>

    <x-cuerpo >
        <x-slot name="contenido">
            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Agregar nuevo Rol</h2> 
            </div>

            
            <div>

                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf
                <div class="form-group">
                    <label for="rol">Nombre del Rol</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del Rol">
                @error('name')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
                </div>

                <div class="h3">Permisos disponibles</div>
                @foreach ($permisos as $permiso)
                <div>
                    {{-- <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="{{ $permiso->id }}"  name="permissions[]">
                        <label class="custom-control-label" for="{{ $permiso->id }}">{{ $permiso->description }}</label>
                    </div> --}}
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="{{ $permiso->id }}" id="{{ $permiso->id }}" name="permissions[]">
                        <label class="form-check-label" for="{{ $permiso->id }}">{{ $permiso->description }}</label>
                    </div>
                </div>
                    
                @endforeach

                <div class="text-right">
                    <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
                </div>

                </form>

                {{-- @json($permisos) --}}
                
            </div>
    
                

        </x-slot>
    
        <x-slot name="lateral">
            {{-- @json($productos) --}}
        </x-slot>

    </x-cuerpo>

    @push('scripts')

    @endpush

</x-principal-layout>