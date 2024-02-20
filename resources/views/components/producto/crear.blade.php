<div class="card" wire:ignore.self>
    <div class="card-body px-lg-5 pt-0" style="color: #757575;">
    {{-- Form  --}}
    <form wire:submit.prevent="store">

      <div class="row">

        <div class="md-form col-md-8 col-12">
          <input type="text" id="nombre" name="nombre" wire:model.defer="nombre" placeholder="Nombre del Producto" class="form-control">
          {{-- <label for="nombre">Nombre del producto</label> --}}
          @error('nombre')
          <span class="text-danger">{{$message}}</span>
          @enderror
      </div>     
         
      <div class="md-form col-md-4 com-12">
        {{-- <input type="text" id="nombre" name="nombre" wire:model.defer="nombre" placeholder="Categoria" class="form-control">
        <label for="nombre">Nombre de la Categoria</label>
        @error('nombre')
        <span class="text-danger">{{$message}}</span>
        @enderror --}}
        <select class="browser-default custom-select pr-2" wire:model.defer="categoria">
          {{-- <option selected>Seleccione una Categoria</option> --}}
          @foreach ($categorias as $cat)
            <option value="{{ $cat->id }}" @if ($cat->principal == 1)
              selected
            @endif >{{ $cat->nombre }}</option>
          @endforeach
        </select>
      </div>

      </div>


      <div class="row">

        <div class="md-form col-md-4 col-12">
          <input type="number" step="any" id="precio_costo" name="precio_costo" wire:model.defer="precio_costo" placeholder="Precio de Costo" class="form-control">
          {{-- <label for="precio_costo">Precio de Costo</label> --}}
          @error('precio_costo')
          <span class="text-danger">{{$message}}</span>
          @enderror
      </div>        
      <div class="md-form col-md-4 com-12">
        <input type="number" step="any" id="precio_venta" name="precio_venta" wire:model.defer="precio_venta" placeholder="Precio Venta" class="form-control">
        {{-- <label for="nombre">Precio Venta</label> --}}
        @error('precio_venta')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
      <div class="md-form col-md-4 com-12">

        <div class="switch mt-4">
          <label>
           Gravado ||  Off
            <input type="checkbox" wire:model.defer="gravado" checked>
            <span class="lever"></span> On 
          </label>
        </div>

      </div>

      </div>


      <div class="row z-depth-2 bordeado-x2">
        <div class="md-form col-md-6 col-12">
          <div class="h5 mt-2 ml-2">Agregar Opciones</div>


            <div>
              @foreach ($opciones as $opcion)
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="opcion-{{ $opcion->id }}" name="opcion-{{ $opcion->id }}" wire:model="opcionesSelect.{{ $opcion->id }}" value="{{ $opcion->id }}">
              <label class="form-check-label" for="opcion-{{ $opcion->id }}">{{ $opcion->nombre }}</label>
            </div>
            @endforeach
            </div>


        </div> 
        <div class="md-form col-md-6 col-12">
          
          <div class="h5 mt-2 ml-2">Paneles Disponibles</div>
          
          @if (count($paneles))
          <div>
            <select class="browser-default custom-select pr-2" wire:model.defer="panelSelect">
              <option selected>Seleccione una Ubicación</option>
              @foreach ($paneles as $panel)
                <option value="{{ $panel->id }}">{{ $panel->nombre }}</option>
              @endforeach
            </select>
          </div>          
          @endif

        
        </div> 
      </div>




        <div class="row mb-3 mt-3 z-depth-2 bordeado-x2">
          <div class="col text-center mt-3 mb-3">
                  <img id="picture" src="{{ asset('img/ico/' . $imgSelected) }}" class="imgSize">
          </div>

          <div class="col mt-3">
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