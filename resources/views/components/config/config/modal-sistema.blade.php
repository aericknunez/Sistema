<div class="modal" wire:ignore.self id="ModalSistema" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">Cambiar Configuraciones</h5>

        </div>
        <div class="modal-body">

            <form wire:submit.prevent="storeSistema">
          

                <!-- Material form register -->
    <div class="card">
        <!--Card content-->
        <div class="card-body px-lg-5 pt-0" style="color: #757575;">
    
    
            <div class="md-form my-2">
                <input type="text" id="expira" class="form-control" wire:model.defer="expira" placeholder="expira">
                @error('expira')
                        <span class="text-danger">{{$message}}</span>
                 @enderror
            </div>



                <div class="form-row  my-2">
                    <div class="col">
                        <select class="browser-default custom-select" wire:model.defer="edo_sistema">
                            <option value="0">Inactivo</option>
                            <option value="1">Activo</option>
                            <option value="2">Por Vencer</option>
                            <option value="3">Vencido</option>
                          </select>
                    </div>
                    <div class="col">
                        <select class="browser-default custom-select" wire:model.defer="tipo_sistema">
                            <option value="1">Basico</option>
                            <option value="2">Profesional</option>
                            <option value="3">Empresa</option>
                          </select>
                    </div>
                </div>
    
                <div class="md-form my-0">
                    <select class="browser-default custom-select" wire:model.defer="plataforma">
                        <option value="1">Local</option>
                        <option value="2">Web</option>
                      </select>
                </div>

                
                <div class="md-form my-0">
                    <input type="text" id="ftp_server" class="form-control" wire:model.defer="url_to_upload" placeholder="Url de subida">
                </div>
                
                <div class="md-form my-0">
                    <input type="text" id="ftp_server" class="form-control" wire:model.defer="ftp_server" placeholder="Server FTP">
                </div>
    
    
                <div class="md-form my-0">
                    <input type="text" id="user_ftp" class="form-control" wire:model.defer="ftp_user" placeholder="Usuario FTP">
                </div>


    
                <div class="md-form my-0">
                    <input type="text" id="password" class="form-control" wire:model.defer="ftp_password" placeholder="Password FTP">
                </div>

    

                <ul class="list-group font-weight-bold">

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Activar Login:
                        <span>
                            <div class="switch">
                                <label>
                                  Off
                                  <input type="checkbox" wire:model.defer="sys_login">
                                  <span class="lever"></span> On
                                </label>
                              </div>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Activar respaldo:
                        <span>
                            <div class="switch">
                                <label>
                                  Off
                                  <input type="checkbox" wire:model.defer="just_data">
                                  <span class="lever"></span> On
                                </label>
                              </div>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Activar datos especiales:
                        <span>
                            <div class="switch">
                                <label>
                                  Off
                                  <input type="checkbox" wire:model.defer="data_special">
                                  <span class="lever"></span> On
                                </label>
                              </div>
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Activar impresion:
                        <span>
                            <div class="switch">
                                <label>
                                  Off
                                  <input type="checkbox" wire:model.defer="print">
                                  <span class="lever"></span> On
                                </label>
                              </div>
                        </span>
                    </li>


                </ul>
    
                <div class="md-form my-0">
                    <input type="text" id="sync_time" class="form-control" wire:model.defer="sync_time" placeholder="Tiempo de sincronización en segundos">
                </div>


    
                <div class="md-form my-0">
                    <input type="text" id="livewire_path" class="form-control" wire:model.defer="livewire_path" placeholder="Direccion livewire">
                </div>
  
    
    
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