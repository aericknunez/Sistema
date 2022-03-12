<div class="d-flex">

    <ul class="list-inline">
        <li class="list-inline-item h4-responsive">
            {{ session('delivery_nombre') }}
        </li>
        <li class="list-inline-item">
            @if ( session('delivery_direccion'))
            Direcci&oacuten: {{ session('delivery_direccion') }}
            @endif
        </li>
        <li class="list-inline-item">
            @if (session('delivery_telefono'))
            Tel&eacutefono: {{ session('delivery_telefono') }}
            @endif
        </li>
    </ul>

</div>