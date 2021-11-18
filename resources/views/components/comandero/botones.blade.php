<div>
    <footer class="bg-white body_rounded mt-n5 fixed-bottom osahan-footer-nav shadow">
        <div class="row p-0 align-items-center click">
        
        @if (session('principal_ticket_pantalla'))

            <div  wire:loading.remove wire:target="btnGuardar" class="col text-center pointer">
                <a wire:click="btnGuardar()" class="text-success">
                 <h1 class="mb-0"><span class="mdi mdi-content-save-all"></span></h1>
                    <span class="mdi mdi-circle-medium text-warning"></span></a>
                </a>
            </div>

            <div  wire:loading wire:target="btnGuardar" class="col text-center">
                <a class="text-success">
                 <h1 class="mb-0"><span class="mdi mdi-content-save-all"></span></h1>
                    <span class="mdi mdi-circle-medium text-warning"></span></a>
                </a>
            </div>
        @endif
            
        @if (session('impresion_imprimir_antes'))
            <div class="col text-center pointer">
                <a wire:click="btnImprimirPreCuenta()" class="text-muted">
                    <h1 class="mb-0"><span class="mdi mdi-printer"></span></h1>
                </a>
            </div>
        @endif
        
            
            <div class="col text-center pointer">
                <a data-toggle="modal" data-target="#ModalNombre" class="text-muted">
                    <h1 class="mb-0"><span class="mdi mdi-account-details"></span></h1>
                </a>
            </div>
            
         @if (session('principal_comentarios_comanda'))
            <div class="col text-center pointer">
                <a data-toggle="modal" data-target="#ModalComentario" class="text-muted">
                    <h1 class="mb-0"><span class="mdi mdi-comment-processing-outline"></span></h1>
                </a>
            </div>
        @endif
        
            
            <div class="col text-center pointer">
                <a href="{{ route('comandero.cambios') }}" class="text-muted">
                    <h1 class="mb-0"><span class="mdi mdi-division"></span></h1>
                </a>
            </div>
        
        </div>
        </footer>
</div>