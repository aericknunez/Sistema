<div>
  
    @if ($datos)

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

            @foreach ($datos as $producto)      

              <tr class="tventas">
                <td class="text-center font-weight-bold">{{ $producto->cliente }}</td>
                <td class="font-weight-bold">{{ $producto->producto }}</td>
                <td class="font-weight-bold">{{ $producto->total }}</td>
                <td  class="click">
                    @if ($producto->cliente == session('cliente'))
                    <a>
                        <span><i class="fas fa-ban red-text fa-2x" aria-hidden="true"></i></span>
                    </a>
                    @else
                    <a wire:key="{{ $loop->index }}" wire:click="asignarProducto({{ $producto->id }})" wire:loading.attr="disabled">
                        <span><i class="fas fa-check-square green-text fa-2x" aria-hidden="true"></i></span>
                    </a>
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
    <div class="text-center"><img src="{{ asset("img/logo/1604553637.jpg") }}" alt="" class="img-fluid hoverable"></div>
    @endif



</div>