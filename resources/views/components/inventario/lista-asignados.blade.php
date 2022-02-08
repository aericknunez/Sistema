<div>

    @if (count($proIco))
  
          
          <div class="table-responsive">
              <table class="table table-sm table-hover table-striped table-round">
                <thead>
                  <tr>
                    <th scope="col">Producto</th>
                    <th scope="col" data-toggle="tooltip" data-html="true"
                    title="<p>Mostrar cantidades en el reporte del dia</p>">Mostrar</th>
                    <th scope="col">Minimo</th>
                    <th scope="col" data-toggle="tooltip" data-html="true"
                    title="<p>Unidad de medida del producto</p>">Unidad</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
      
                  @foreach ($proIco as $dato)
  
                      <tr>
                          <td class="font-weight-bold text-uppercase">{{ $dato->producto }}</td>
                          <td class="text-uppercase text-center"></td>
                          <td class="text-uppercase text-center"></td>
                          <td class="text-uppercase"></td>
                          <td class="font-weight-bold text-uppercase text-center"></td>
                          <td>
                            <a wire:click="seleccionarProducto({{ $dato->id }})" data-toggle="modal" data-target="#Add" title="Agregar Productos"><i class="fas fa-plus-square fa-2x green-text mx-2"></i></a>
                            <a wire:click="detallesProducto({{ $dato->id }})" data-toggle="modal" data-target="#Detalles" title="Ultimos Movimientos"><i class="fas fa-list-ul fa-2x blue-text mx-2"></i> </a>
                                                        
                          </td>
                      </tr>
                  @endforeach    
      
                </tbody>
            
              </table>
            </div>
      
    @else

    <x-globales.no-registros />    

    @endif
      
</div>
      