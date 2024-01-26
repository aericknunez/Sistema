<div class="card" wire:ignore.self>
    <div class="card-body px-lg-5 pt-0" style="color: #757575;">
    {{-- Form  --}}
    <form wire:submit.prevent="store">

        <div class="md-form">
          <input type="text" id="nombre" name="nombre" wire:model.defer="nombre" placeholder="Categoria" class="form-control">
          {{-- <label for="nombre">Nombre de la Categoria</label> --}}
          @error('nombre')
          <span class="text-danger">{{$message}}</span>
          @enderror
      </div>


        <div class="row mb-3">
          <div class="col">
              <div class="image-visualizer">
                  <img id="picture" src="{{asset('img/ico/' . $imgSelected)}}" class="imgSize">
              </div>
          </div>

          <div class="col">
            <a data-toggle="modal" data-target="#ModalIconos" class="btn btn-secondary btn-sm"><i class="fas fa-plus"></i> Seleccionar Imagen</a>
          </div>

        </div>


        <div class="text-right">
          <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
        </div>
      </form>
    {{-- form  --}}
    </div>
</div>