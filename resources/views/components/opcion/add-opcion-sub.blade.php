<div class="card" wire:ignore.self>
    <div class="text-center font-weight-bold text-uppercase my-3 h3">
        {{ $datos->nombre }}
    </div>


    <table class="table table-borderless table-ms table-hover">
        <thead>
          <tr>
            <th scope="col" style="width: 1%;">#</th>
            <th scope="col" style="width: 1%;">Opción</th>
            <th scope="col" style="width: 1%;">Precio</th>
            <th scope="col" style="width: 1%;">Borrar</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($datos->sub as $opcion)
            <tr>
                <td><img src="{{asset('img/ico/' . $opcion->img)}}"  width="50" height="50"></td>
                <th scope="row">{{ $opcion->nombre }}</th>
                <td>{{ dinero($opcion->precio) }}</td>
                <td>
                    <a wire:click="destroySubOpcion({{ $opcion->id }})" wire:loading.attr="disabled">
                        <span><i class="fas fa-trash red-text fa-lg" aria-hidden="true"></i></span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>



    <div class="card-body px-lg-5" style="color: #757575;">
    {{-- Form  --}}
    <form wire:submit.prevent="storeOption">

        <div class="md-form">
          <input type="text" id="subopcion" name="subopcion" wire:model.defer="subopcion" placeholder="Nombre de la Opción" class="form-control">
          @error('subopcion')
          <span class="text-danger">{{$message}}</span>
          @enderror
      </div>
      <div class="md-form">
        <input type="number" step="any" id="precio" name="precio" wire:model.defer="precio" placeholder="Precio" class="form-control">
        @error('precio')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>


        <div class="row">
          <div class="col">
              <div class="image-visualizer">
                  <img id="picture" src="{{asset('img/ico/' . $imgSelected)}}" class="imgSize">
              </div>
          </div>

          <div class="col">
            <a data-toggle="modal" data-target="#ModalIconos" class="btn blue-gradient btn-sm"><i class="fas fa-plus"></i> Seleccionar Imagen</a>
          </div>
        </div>


        <div class="text-right">
          <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
        </div>
      </form>
    {{-- form  --}}
    </div>
</div>