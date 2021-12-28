<div class="modal" wire:ignore.self id="ModalImpresiones" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-lg z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">Cambiar Configuraciones</h5>

        </div>
        <div class="modal-body">

            <form wire:submit.prevent="storeImpresiones">
          

                <!-- Material form register -->
    <div class="card">
        <!--Card content-->
        <div class="card-body px-lg-5 pt-0" style="color: #757575;">
    
    
            <ul class="list-group font-weight-bold">

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Activar ningun documento:
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="ninguno">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Activar opciones de Ticket:
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="ticket">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Activar opciones de Factura:
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="factura">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Activar opciones de Credito Fiscal:
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="credito_fiscal">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Activar opciones de No Sujeto:
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="no_sujeto">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Activar opciones de imprimir Pre Cuenta:
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="imprimir_antes">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Activar opciones de impresiones de Comandas:
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="comanda">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Seleccionar documento opcional:
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="opcional">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Documento predeterminado del sistema:
                    <span>
                        <select class="browser-default custom-select" wire:model.defer="seleccionado">
                            <option value="0">Ninguno</option>
                            <option value="1">Ticket</option>
                            <option value="2">Factura</option>
                            <option value="3">Credito Fiscal</option>
                            <option value="4">No Sujeto</option>
                          </select>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                 Agrupar los productos al mandar a imprimir la comanda:
                  <span>
                      <div class="switch">
                          <label>
                            Off
                            <input type="checkbox" wire:model.defer="comanda_agrupada">
                            <span class="lever"></span> On
                          </label>
                        </div>
                  </span>
              </li>
            </ul>
    
    
    
    
    
    
        </div>
    
    </div>
    <!-- Material form register -->
    
    <div class="text-right">
            <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
        </div>
    </form>


        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-primary btn-rounded"  data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>