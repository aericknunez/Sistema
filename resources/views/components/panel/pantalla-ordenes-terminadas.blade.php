<div class="modal" wire:ignore.self id="ModalOrdenesTerminadas" tabindex="-1" role="dialog" data-backdrop="false">
    <div class="modal-dialog modal-lg z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">ORDENES TERMINADAS</h5>

        </div>
        <div class="modal-body">


            <div class="card" >
                <div class="card-body px-lg-5 pt-0 mt-3">
                    
                    @if ($datos)
    
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-striped table-round">
                          <thead>
                            <tr>
                              <th scope="col"># Orden</th>
                              <th scope="col">Producto</th>
                              <th scope="col">Hora</th>
                              <th scope="col">Usuario</th>
                            </tr>
                          </thead>
                          <tbody>
                
                            @foreach ($datos as $producto)
            
                                <tr
                                @if ($producto->imprimir == 4)
                                    class="red-text"
                                @endif
                                >
                                    <td >{{ $producto->orden }}</td>
                                    <td class="font-weight-bold">{{ $producto->producto }}</td>
                                    <td >{{ $producto->created_at }}
                                    <small>{{ $producto->created_at->diffForHumans(now()) }}</small>
                                    </td>
                                    <td >{{ $producto->user->name }}  </td>
                                </tr>

                                @if (count($producto->subOpcion) >= 1)
            
                                <tr class="topcion">
                                  <td colspan="4">
                                      @foreach ($producto->subOpcion as $opcion)
                                          | {{ $opcion->nombre }}
                                      @endforeach
                                  </td>
                                </tr>
                  
                            @endif


                            @endforeach    
               
                          </tbody>
                      
                        </table>
                      </div>
                
                      @else
            
                      <x-globales.no-registros />    
                
                      @endif



                </div>
            </div>
    
        </div>
        <div class="modal-footer">
        
          <a class="btn btn-secondary btn-sm btn-rounded" wire:click="verMasTerminadas()">Ver mas</a>
          <button wire:click="cerrarModalTerminadas()" type="button" class="btn btn-primary btn-rounded" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>