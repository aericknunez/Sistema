<div class="modal" wire:ignore.self id="AddMesa" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">AGREGAR UNA NUEVA ORDEN</h5>

        </div>
        <div class="modal-body">


        <div class="d-flex justify-content-center">
            <div class="shadow-box-example z-depth-4 flex-center bordeado-x2"> 
                <p class="black-text display-1 mx-3">
                    {{ $clientes }}
                </p>
            </div>
        </div>


        <div class="d-flex justify-content-center mt-2">
            <div class="btn-group radio-group ml-2">
            <a wire:click="decrementar()" class="btn btn-sm btn-primary btn-rounded waves-effect waves-light"><strong>—</strong></a>
            <a wire:click="incrementar()" class="btn btn-sm btn-primary btn-rounded waves-effect waves-light active"><strong>+</strong></a>

            </div>
        </div>

      <form wire:submit.prevent="btnAddMesa">

        <div class="d-flex justify-content-center mt-2">
          <div class="col-md-8">
            <select class="browser-default custom-select custom-select-lg mb-3" wire:model="mesaNombre">
              <option selected>SELECCIONE UNA MESA</option>
                @for ($i = 1; $i < session('principal_no_mesas'); $i++)
                    <option value="MESA NUMERO {{ $i }}">MESA NUMERO {{ $i }}</option>
                @endfor
            </select>
          </div>
      </div>



            <div class="text-right mt-4">
                <button class="btn btn-danger mr-1 box_rounded  px-4 w-50" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
            </div>
        </form>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-rounded"  data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>