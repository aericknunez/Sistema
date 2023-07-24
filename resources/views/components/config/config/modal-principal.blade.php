<div class="modal" wire:ignore.self id="ModalPrincipal" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-lg z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">Cambiar Configuraciones</h5>

        </div>
        <div class="modal-body">

            <form wire:submit.prevent="storePrincipal">
          

                <!-- Material form register -->
    <div class="card">
        <!--Card content-->
        <div class="card-body px-lg-5 pt-0" style="color: #757575;">
    
    
            <ul class="list-group font-weight-bold">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Cantidad de Mesas para clientes:
                    <span>
                        <input type="number" id="no_mesas" wire:model.defer="no_mesas" class="form-control" maxlength="2">
                    </span>
                  </li>

              @if (session('config_tipo_usuario') == 1)  

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Cantidad de Cajas de cobro:
                    <span>
                        <input type="number" id="no_mesas" wire:model.defer="no_cajas" class="form-control" maxlength="2">
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Forma de mostrar las comandas en cocina:
                    <span>
                        <select class="browser-default custom-select" wire:model.defer="ticket_pantalla">
                            <option value="0">Ninguno</option>
                            <option value="1">Pantalla</option>
                            <option value="2">Ticket</option>
                          </select>
                    </span>
                </li>
              @endif
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Activar el registro de justificación al borrar una orden:
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="registro_borrar">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Activar solicitar clave al borrar una orden:
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="solicitar_clave">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Mostrar todas las ordenes al mesero
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="ordenes_todo">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>

                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Activar comentarios en comanda para cocina:
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="comentarios_comanda">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Activar opciones para llevar o comer aqui:
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="llevar_aqui">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Activar propina establecida en Comida Rapida:
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="propina_rapida">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Activar propina establecida en Servicio a Mesa:
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="propina_mesa">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Activar propina establecida en Delivery:
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="propina_delivery">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Establecer predeterminado si es para llevar o Aqui en Comida Rapida:
                    <span>
                        <select class="browser-default custom-select" wire:model.defer="llevar_rapida">
                            <option value="1">Llevar</option>
                            <option value="2">Aqui</option>
                          </select>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Establecer predeterminado si es para llevar o Aqui en Servicio a Mesa:
                    <span>
                        <select class="browser-default custom-select" wire:model.defer="llevar_mesa">
                            <option value="1">Llevar</option>
                            <option value="2">Aqui</option>
                          </select>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Establecer predeterminado si es para llevar o Aqui en Delivery:
                    <span>
                        <select class="browser-default custom-select" wire:model.defer="llevar_delivery">
                            <option value="1">Llevar</option>
                            <option value="2">Aqui</option>
                          </select>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Establecer si al cambiar para llevar se debe eliminar la propina:
                  <span>
                    <div class="switch">
                        <label>
                          Off
                          <input type="checkbox" wire:model.defer="llevar_aqui_propina_cambia">
                          <span class="lever"></span> On
                        </label>
                      </div>
                </span>
              </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Activar sonido al marcar Ordenes
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="sonido">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Levantar modal de categorias al marcar producto
                  <span>
                      <div class="switch">
                          <label>
                            Off
                            <input type="checkbox" wire:model.defer="levantar_modal">
                            <span class="lever"></span> On
                          </label>
                        </div>
                  </span>
              </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Tipo de Menu
                    <span>
                        <select class="browser-default custom-select" wire:model.defer="tipo_menu">
                            <option value="1">Normal</option>
                            <option value="2">Clasico</option>
                          </select>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Activar Otras Ventas
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="otras_ventas">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Activar Venta Especial
                    <span>
                        <div class="switch">
                            <label>
                              Off
                              <input type="checkbox" wire:model.defer="venta_especial">
                              <span class="lever"></span> On
                            </label>
                          </div>
                    </span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  Agrupar productos en Ordenes
                  <span>
                      <div class="switch">
                          <label>
                            Off
                            <input type="checkbox" wire:model.defer="agrupar_orden">
                            <span class="lever"></span> On
                          </label>
                        </div>
                  </span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                Restringir ventas cuando no existe inventario
                <span>
                    <div class="switch">
                        <label>
                          Off
                          <input type="checkbox" wire:model.defer="restringir_inventario">
                          <span class="lever"></span> On
                        </label>
                      </div>
                </span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              Numero de Items Factura:
              <span>
                  <input type="number" id="lineas_factura" wire:model.defer="lineas_factura" class="form-control" maxlength="2">
              </span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
              Numero Items Credito Fiscal:
              <span>
                  <input type="number" id="lineas_ccf" wire:model.defer="lineas_ccf" class="form-control" maxlength="2">
              </span>
            </li>
            </ul>
    
            <li class="list-group-item d-flex justify-content-between align-items-center">
              Ordernar Menu Alfabeticamente
              <span>
                  <div class="switch">
                      <label>
                        Off
                        <input type="checkbox" wire:model.defer="ordenar_menu">
                        <span class="lever"></span> On
                      </label>
                    </div>
              </span>
          </li>
    
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Permitir Mesas a Mesero
            <span>
                <div class="switch">
                    <label>
                      Off
                      <input type="checkbox" wire:model.defer="ver_mesas">
                      <span class="lever"></span> On
                    </label>
                  </div>
            </span>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-center">
          Permitir Delivery a Mesero
          <span>
              <div class="switch">
                  <label>
                    Off
                    <input type="checkbox" wire:model.defer="ver_delivery">
                    <span class="lever"></span> On
                  </label>
                </div>
          </span>
      </li>
    
    
    
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