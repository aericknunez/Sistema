<div class="modal" id="ModalIconos" tabindex="-1" role="dialog" data-backdrop="false" wire:ignore.self>
    <div class="modal-dialog modal-fluid z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">SELECCIONE UNA IMAGEN</h5>

        </div>
        <div class="modal-body">

{{-- <div class="input-group md-form form-sm form-2 px-4">
  <input class="form-control my-0 lime-border" type="text" placeholder="Buscar" aria-label="Search">
  <div class="input-group-append">
    <span class="input-group-text lime lighten-2" id="basic-text1"><i class="fas fa-search text-grey"
        aria-hidden="true"></i></span>
  </div>
</div> --}}


          <div class="row justify-content-center click">

        @foreach ($datos as $icono)
            <div class="mx-2">
                <a wire:click="selectImageTmp('{{ $icono->imagen }}')" data-dismiss="modal">
                    <figure class="figure">
                        <img src="{{ asset('img/ico/' . $icono->imagen) }}" class="imgSize figure-img img-fluid z-depth-2"  alt="Icono" >
                    </figure>
                </a>
            </div>
        @endforeach
        {{ $datos->links() }}
              

        </div>

   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal" wire:click="cerrarModalImg()">Cerrar</button>
        </div>
      </div>
    </div>
  </div>