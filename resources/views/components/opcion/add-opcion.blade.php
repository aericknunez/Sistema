<div class="card" wire:ignore.self>
    <div class="card-body px-lg-5 pt-0" style="color: #757575;">
    {{-- Form  --}}
    <form wire:submit.prevent="store">

        <div class="md-form">
          <input type="text" id="nombre" name="nombre" wire:model.defer="nombre" placeholder="Nombre del modificador" class="form-control">
          {{-- <label for="nombre">Nombre de la Categoria</label> --}}
          @error('nombre')
          <span class="text-danger">{{$message}}</span>
          @enderror
      </div>

        <div class="text-right">
          <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
        </div>
      </form>
    {{-- form  --}}
    </div>
</div>