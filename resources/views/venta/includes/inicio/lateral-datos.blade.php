<div class="text-center border border-primary rounded font-weight-bold z-depth-2 mt-2">
    <div class="row mr-2 ml-2">
        @if (session('principal_llevar_aqui'))
        <div class="col-4 text-left">
            <a wire:click="BtnAquiLlevar()">
                {{ llevarAqui(session('llevar_aqui')) }}
            </a>
        </div>        
        @endif

        <div class="col-4 text-center"><a data-toggle="modal" data-target="#ModalTipoVenta">{{ tipoVenta(session('impresion_seleccionado')) }}</a></div>
        <div class="col-4 text-right"><a  data-toggle="modal" data-target="#ModalTipoPago">{{ session('tipo_pagoM') }}</a></div>
    </div>
</div>