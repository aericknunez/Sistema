<div>
        
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped table-round">
              <thead>
                <tr>
                  <th scope="col">Opción</th>
                  <th scope="col">Descripción</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
    

                    <tr>
                        <td class="font-weight-bold text-uppercase">RECARGAR iCONOS</td>
                        <td>Busca nuevos iconos y los agrega a la base de datos</td>
                        <td>
                            <a class="btn btn-secondary btn-sm btn-rounded waves-effect" wire:click="recargarIconos()"><i class="fas fa-sync mr-1"></i> Actualizar</a>
                        </td>
                    </tr>

                    <tr>
                        <td class="font-weight-bold text-uppercase">CREAR MENU</td>
                        <td>Carga nuevamente los prodcutos agregados al sistema para que esten dispobles a la venta</td>
                        <td>
                            <a class="btn btn-primary btn-sm btn-rounded waves-effect" wire:click="crearMenu()"><i class="fas fa-sync mr-1"></i> Actualizar</a>
                        </td>
                    </tr>

                    <tr>
                      <td class="font-weight-bold text-uppercase">SINCRONIZADO</td>
                      <td>Mantiene al dia los archivos que se deben sincronizar para crear los respaldos del sistema</td>
                      <td>
                          <a class="btn btn-cyan btn-sm btn-rounded waves-effect" wire:click="recargarTablas()"><i class="fas fa-sync mr-1"></i> Actualizar</a>
                      </td>
                  </tr>
    
              </tbody>
          
            </table>
          </div>
    
    
    </div>
    