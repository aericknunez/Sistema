@php
$filtered = collect($datos->productos)->where('panel', $panel)->where('imprimir', 2)->all();
@endphp

@if (count($filtered) > 0)
<div class="mt-3 col-md-3">
<div class="card promoting-card">
  
    <!-- Card content -->
    <div wire:click="deleteOrden({{ $datos->id }})" wire:key="{{ $datos->id }}" class="py-2 px-3 d-flex flex-row {{ getColor($datos->id) }}  link pointer">
      <div>
        <!-- Title -->
        <div class="h4 font-weight-bold">Orden # {{ $datos->id }}  {{ $datos->nombre_mesa }}</div>
        <!-- Subtitle -->
        
        <p class="card-text"><i class="far fa-clock pr-2"></i>{{ $datos->created_at }} Hace: {{ $datos->created_at->diffForHumans(now()) }}</p>
 
        @if ($datos->comentario)
        <i class="far fa-comment-dots"></i> {{ $datos->comentario }}
        @endif
        
      </div>
    </div>
  
      
  <table class="table table-borderless table-sm table-hover table-striped">
    <tbody>

        @foreach ($datos->productos as $producto)      

        @if ($producto->panel == $panel)
          
            @if ($producto->imprimir == 1)
                <tr><td wire:click="deleteProduct({{ $producto->id }}, {{ $datos->id }})" wire:key="{{ $producto->id }}" class="font-weight-bold link pointer"><i class="far fa-clock ml-2 pr-2 blue-text"></i> {{ $producto->producto }}</td></tr>

            @elseif ($producto->imprimir == 2)
                <tr><td wire:click="deleteProduct({{ $producto->id }}, {{ $datos->id }})" wire:key="{{ $producto->id }}" class="font-weight-bold link pointer"><i class="fas fa-check-double ml-2 pr-2 green-text"></i>{{ $producto->producto }}</div></td></tr>

            @elseif ($producto->imprimir == 4)
                <tr><td wire:click="deleteProduct({{ $producto->id }}, {{ $datos->id }})" wire:key="{{ $producto->id }}" class="font-weight-bold withe red-text link pointer"><i class="far fa-trash-alt ml-2 pr-2"></i> {{ $producto->producto }}</td></tr>
            @endif
          
          @if (count($producto->subOpcion) >= 1 and $producto->imprimir != 3)        
              <tr class="topcion">
                <td>
                    @foreach ($producto->subOpcion as $opcion)
                        | {{ $opcion->nombre }}
                    @endforeach
                </td>
              </tr>
          @endif

      @endif
      
      @endforeach

    </tbody>
  </table>

        <!-- Card footer -->
  <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">
    <ul class="list-unstyled list-inline font-small">
      <li class="list-inline-item pr-2 white-text"><i class="far fa-user pr-1"></i>{{ $datos->usuario }}</li>

      <li class="list-inline-item pr-2 white-text">
        @if ($datos->llevar_aqui == 1)
        <i class="fas fa-truck pr-1"></i>
        @else
        <i class="fas fa-utensils"></i>
        @endif
        {{ llevarAqui($datos->llevar_aqui) }}
      </li>
    </ul>

  </div>

  </div>
</div>

@endif
