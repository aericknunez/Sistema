<div wire:ignore >
    
        <section class="near py-2 pl-3 bg-light">
            <div class="near_slider click"><a  wire:click="btnCatSelect(1)" wire:loading.class="disabled" wire:target="btnCatSelect(1)">
                            <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm pointer">
                            <img src="{{ asset("img/ico/default.png") }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                            <p class="mb-1 text-dark">Principal</p>
                            </div>
                        </a><a  wire:click="btnCatSelect(2)" wire:loading.class="disabled" wire:target="btnCatSelect(2)">
                            <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm pointer">
                            <img src="{{ asset("img/ico/5abcf61fce.png") }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                            <p class="mb-1 text-dark">Comida Mexicana</p>
                            </div>
                        </a><a  wire:click="btnCatSelect(3)" wire:loading.class="disabled" wire:target="btnCatSelect(3)">
                            <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm pointer">
                            <img src="{{ asset("img/ico/761b24a424.png") }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                            <p class="mb-1 text-dark">Comida Tipica</p>
                            </div>
                        </a><a  wire:click="btnCatSelect(4)" wire:loading.class="disabled" wire:target="btnCatSelect(4)">
                            <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm pointer">
                            <img src="{{ asset("img/ico/da50a39189.png") }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                            <p class="mb-1 text-dark">Carnes</p>
                            </div>
                        </a><a  wire:click="btnCatSelect(5)" wire:loading.class="disabled" wire:target="btnCatSelect(5)">
                            <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm pointer">
                            <img src="{{ asset("img/ico/3bea39a14f.png") }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                            <p class="mb-1 text-dark">Aves</p>
                            </div>
                        </a><a  wire:click="btnCatSelect(6)" wire:loading.class="disabled" wire:target="btnCatSelect(6)">
                            <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm pointer">
                            <img src="{{ asset("img/ico/2789770707.png") }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                            <p class="mb-1 text-dark">Mariscos</p>
                            </div>
                        </a><a  wire:click="btnCatSelect(7)" wire:loading.class="disabled" wire:target="btnCatSelect(7)">
                            <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm pointer">
                            <img src="{{ asset("img/ico/cb0a740592.png") }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                            <p class="mb-1 text-dark">Guarniciones Extra</p>
                            </div>
                        </a><a  wire:click="btnCatSelect(8)" wire:loading.class="disabled" wire:target="btnCatSelect(8)">
                            <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm pointer">
                            <img src="{{ asset("img/ico/7145f66574.png") }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                            <p class="mb-1 text-dark">Pastas</p>
                            </div>
                        </a><a  wire:click="btnCatSelect(9)" wire:loading.class="disabled" wire:target="btnCatSelect(9)">
                            <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm pointer">
                            <img src="{{ asset("img/ico/ff3c5e4d37.png") }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                            <p class="mb-1 text-dark">Emparedados</p>
                            </div>
                        </a><a  wire:click="btnCatSelect(10)" wire:loading.class="disabled" wire:target="btnCatSelect(10)">
                            <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm pointer">
                            <img src="{{ asset("img/ico/20a4d81339.png") }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                            <p class="mb-1 text-dark">Cocteles y ceviches</p>
                            </div>
                        </a><a  wire:click="btnCatSelect(11)" wire:loading.class="disabled" wire:target="btnCatSelect(11)">
                            <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm pointer">
                            <img src="{{ asset("img/ico/7eb4408630.png") }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                            <p class="mb-1 text-dark">Infantil</p>
                            </div>
                        </a></div>
        </section>

</div><div class="modal" id="opcion-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OPCIONES DISPONIBLES</h5>

    </div>
    <div class="modal-body">

<div class="px-2 mt-4">   
<section class="bg-light body_rounded mt-n5 p-3">
        
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><a wire:click="addOpcion(1)" title="Termino Medio" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/5f4615dbc5.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">Termino Medio</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(2)" title="Tres Cuartos" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/5f4615dbc5.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">Tres Cuartos</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(3)" title="Bien Cocida" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/5f4615dbc5.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">Bien Cocida</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a></div>
</div>
</section>
</div>



</div>
    <div class="modal-footer">
        <button type="button" class="btn blue-gradient btn-rounded" wire:click="omitirOpcion()">Omitir Opción <i class="fas fa-angle-double-right"></i></button>
    </div>
    </div>
</div>
</div>