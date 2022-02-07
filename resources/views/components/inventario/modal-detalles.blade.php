<div class="modal" wire:ignore.self id="Detalles" tabindex="-1" role="dialog" data-backdrop="true">
    <div class="modal-dialog modal-lg z-depth-4 bordeado-x1" role="document">
      <div class="modal-content bordeado-x1">
        <div class="modal-header">
          <h5 class="modal-title">ULTIMOS MOVIMIENTOS DEL PRODUCTO</h5>

        </div>
        <div class="modal-body">


            <div class="card" >
                <div class="card-body px-lg-5 pt-0" style="color: #757575;">
                {{-- Form  --}}


                <div class="table-responsive">
                  <table class="table table-sm table-hover table-striped table-round">
                    <thead>
                      <tr>
                        <th scope="col">Fecha</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Comentario</th>
                        <th scope="col">Acción</th>
                        <th scope="col">Usuario</th>
                      </tr>
                    </thead>
                    <tbody>
          
                      @foreach ($historial as $dato)
      
                          <tr>
                              <td class="text-uppercase">{{ formatFecha($dato->created_at) }}</td>
                              <td class="font-weight-bold text-uppercase">{{ $dato->cantidad }}</td>
                              <td class="text-uppercase">{{ $dato->comentario }}</td>
                              <td class="font-weight-bold text-uppercase">
                                @if ($dato->tipo == 1)
                                  <span class="green-text">Entrada</span>
                                @else
                                <span class="red-text">Salida</span>
                                @endif
                                </td>
                              <td class="text-uppercase">{{ $dato->user }}</td>
                          </tr>
                      @endforeach    
          
                    </tbody>
                
                  </table>
                </div>



                </div>
            </div>
            
   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary btn-rounded" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>