<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true" wire:ignore.self >
  <div class="modal-dialog modal-sm modal-notify modal-warning bordeado-x1" role="document">
    <!--Content-->
    <div class="modal-content text-center bordeado-x1">
      <!--Header-->
      <div class="modal-header d-flex justify-content-center bordeado-x1">
        <p class="heading">Eliminar corte?</p>
      </div>

      <!--Body-->
      <div class="modal-body">
        


    <form wire:submit.prevent="deleteCorte">
     
     <div class="form-group row justify-content-center align-items-center">
      <div class="col-xs-2">
        <label for="ex1">Clave</label>
        <input wire:model.defer="random" name="random" type="text" id="random" size="8" maxlength="8" class="form-control" placeholder="JS4D2" required autofocus />
        @error('random')
        <span class="text-danger">{{$message}}</span>
        @enderror
      </div>
    </div>
    <button class="btn btn-grey"  type="submit"><i class="fas fa-times fa-2x animated jello infinite"></i> Eliminar Corte</button>
    </form>



      </div>
      <!--Footer-->
      <div class="modal-footer flex-center">
        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">Cancelar</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
