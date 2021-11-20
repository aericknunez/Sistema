<div>

    @if ($datos)
    {{-- Ordeno los datos por codigo para despues procesarlos --}}
    @php
      $datos = $datos->sortBy('cod');
      $datos->values()->all();
      $count = 0;
    @endphp

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


          @if ($count != $producto->cod)
          @php
          $cod = $datos->where('cod', $producto->cod);
          $cod->all();

          $cant = count($cod);
          $total = $cod->sum('total');

          $count = $producto->cod;
          @endphp
          <tr class="tventas">
            <td class="text-center font-weight-bold pointer" data-toggle="modal" data-target="#ModalCantidadProducto" wire:click="selectCod({{ $producto->cod }})">{{ $cant }}</td>
            <td class="font-weight-bold pointer" data-toggle="modal" data-target="#ModalDetalleProductos" wire:click="productSelect({{ $producto->cod }})">{{ $producto->producto }}</td>
            <td class="font-weight-bold">{{ $producto->pv }}</td>
            <td class="font-weight-bold">{{ $total }}</td>
            <td  class="click">
                <a wire:click="delProducto({{ $producto->id }})" wire:loading.attr="disabled">
                    <span><i class="far fa-minus-square red-text fa-lg" aria-hidden="true"></i></span>
                </a>
            </td>
          </tr> 

          @endif


          @endforeach

        </tbody>
      </table>

    @else
    <div class="text-center"><img src="{{ asset("img/logo/" . session("config_logo")) }}" alt="" class="img-fluid hoverable"></div>
    @endif



</div>