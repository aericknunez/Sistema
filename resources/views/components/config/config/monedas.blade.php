<div>

    <div class="clearfix mb-2">
        <h2 class="h2 float-left">Monedas</h2> 
        <div class="float-right pointer click">
            {{-- <small wire:click="asignPrincipal()" data-toggle="modal" data-target="#ModalPrincipal"><i class="fas fa-edit"></i> Cambiar</small> --}}
        </div>
    </div>

    <ul class="list-group font-weight-bold">

        @foreach ($datos as $moneda)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $moneda->moneda }}
                <span class="pointer">
                    @if ($moneda->edo == 1)
                        <span wire:click="cambiarMoneda({{ $moneda->id }})" wire:key="{{ $moneda->id }}" class="badge badge-pill badge-success"><i class="fas fa-check" aria-hidden="true"></i> Activo</span>
                    @else
                        <span wire:click="cambiarMoneda({{ $moneda->id }})" wire:key="{{ $moneda->id }}" class="badge badge-pill badge-danger"><i class="fas fa-ban" aria-hidden="true"></i> Inactivo</span>
                    @endif
                </span>
            </li>         
        @endforeach

    </ul>
</div>