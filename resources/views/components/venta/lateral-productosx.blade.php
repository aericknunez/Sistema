<div>
  
    @if ($datos)

    <table class="table table-sm table-hover table-striped table-round">
        <thead>
          <tr>
            <th scope="col" style="width: 1%;">Cant</th>
            <th scope="col">Producto</th>
            <th scope="col" style="width: 1%;">Precio</th>
            <th scope="col" style="width: 1%;">Total</th>
            <th scope="col" style="width: 1%;" class="click">
                <a wire:click="delOrden">
                <span><i class="fas fa-trash-alt red-text fa-lg" aria-hidden="true"></i></span>
                </a>
            </th>
          </tr>
        </thead>
        <tbody>

            @foreach ($datos as $producto)      

              <tr class="tventas">
                <td class="text-center font-weight-bold">{{ $producto->cantidad }}</td>
                <td class="font-weight-bold">{{ $producto->producto }}</td>
                <td class="font-weight-bold">{{ $producto->pv }}</td>
                <td class="font-weight-bold">{{ $producto->total }}</td>
                <td  class="click">
                    <a wire:click="delProducto({{ $producto->id }})" wire:loading.attr="disabled">
                        <span><i class="far fa-minus-square red-text fa-lg" aria-hidden="true"></i></span>
                    </a>
                </td>
              </tr>
          
          @if (count($producto->subOpcion) >= 1)
            
              <tr class="topcion">
                <td colspan="5">
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