<div>
  
    @if (count($datos))

    <table class="table table-sm table-hover table-striped table-round">
        <thead>
          <tr>
            <th scope="col" style="width: 1%;">Cant</th>
            <th scope="col">Producto</th>
            <th scope="col" style="width: 1%;">Precio</th>
            <th scope="col" style="width: 1%;">Total</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($datos as $producto)      

              <tr class="tventas">
                <td class="text-center font-weight-bold">{{ $producto->cantidad }}</td>
                <td class="font-weight-bold">{{ $producto->producto }}</td>
                <td class="font-weight-bold">{{ $producto->pv }}</td>
                <td class="font-weight-bold">{{ $producto->total }}</td>
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

    @else
    {{ mensajex('Este cliente no tiene productos agregados a su cuenta','danger') }}
    {{-- <div class="text-center"><img src="{{ asset("img/logo/1604553637.jpg") }}" alt="" class="img-fluid hoverable"></div> --}}
    @endif


</div>