<div wire:ignore.self >
  
    @if ($productAgregado)

    <table class="table table-sm table-hover table-striped table-round">
        <thead>
          <tr>
            <th scope="col" style="width: 1%;">Cliente</th>
            <th scope="col">Producto</th>
            <th scope="col" style="width: 1%;">Total</th>
            <th scope="col" style="width: 1%;">
                
            </th>
          </tr>
        </thead>
        <tbody>

            @foreach ($productAgregado as $producto)      

              <tr class="tventas">
                <td class="text-center font-weight-bold">{{ $producto->cliente }}</td>
                <td class="font-weight-bold">{{ $producto->producto }}</td>
                <td class="font-weight-bold">{{ $producto->total }}</td>
                <td  class="click">
                {{-- Al darle seguimiento con wire:key falla y no se muestra correctamente --}}
                    @if ($clientSelected == $producto->cliente)
                        <span><i class="fas fa-ban red-text fa-2x" aria-hidden="true"></i></span>
                    @endif
                    @if ($clientSelected != $producto->cliente)
                        <a wire:click="asignarProducto({{ $producto->id }})" wire:loading.attr="disabled">
                            <span><i class="fas fa-check-square green-text fa-2x" aria-hidden="true"></i></span>
                    @endif
                </td>
              </tr>
          
          @if (count($producto->subOpcion) >= 1)
            
              <tr class="trfcliente">
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

    @else
    <div class="text-center"><img src="{{ asset("img/logo/logo.png") }}" alt="" class="img-fluid hoverable"></div>
    @endif



</div>