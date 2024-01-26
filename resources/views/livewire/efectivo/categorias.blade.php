<div>
    {{-- Aqui se generara el corte, se ingresara la cantidad de efectivo actual --}}
 
    <x-cuerpo >
        <x-slot name="contenido">

            <div class="clearfix mb-2">
                <h2 class="h2 float-left">Categorias de Gastos</h2> 
                <h2 class="float-right">
                    {{-- <a wire:click="newForm()" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i> Agregar Categoria</a> --}}
                </h2>
            </div>


<div class="row">
    <div class="col-md-6 mb-2">

        <div class="card">
            <div class="card-body px-lg-5 pt-0" style="color: #757575;">
                
            {{-- Form  --}}
                <form wire:submit.prevent="btnCategoria">
                    <div class="form-group">
                    <div class="col-xs-2">
                    <label for="ex1" class="active">Categoria</label>
                    <input type="text" wire:model.defer="nombre" id="nombre" class="form-control" autofocus>
                    
                    @error('nombre')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                </div>
                <div class="text-right">
                    <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
                </div>
                </form>
            {{-- form  --}}
            </div>
        </div>




    </div>
    <div class="col-md-6">


        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tipo</th>
                  <th scope="col">Eliminar</th>
                </tr>
              </thead>
              <tbody>


                    @foreach ($datos as $dato)
                    <tr>
                        <th scope="row">{{ $dato->id }}</th>
                        <td class="font-weight-bold text-uppercase">{{ $dato->categoria }}</td>
                        <td>
                            <div>
                            <a wire:click="$emit('deleteCategoria', {{ $dato->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                    
              </tbody>
          
            </table>
          </div>


    </div>
</div>



        </x-slot>
    
        <x-slot name="lateral">



        </x-slot>

    </x-cuerpo>





</div>