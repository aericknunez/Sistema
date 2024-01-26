<div wire:ignore >
    
        <section class="near py-2 pl-3 bg-light">
            <div class="dropdown click">
                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/a19a4bf04b.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">SELECCIONE UNA CATEGORIA</p>
                    </div>
                </a>
                <div class="dropdown dropdown-menu dropdown-primary"><a wire:click="btnCatSelect(1)" wire:loading.class="disabled" wire:target="btnCatSelect(1)" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                                <div class="bg-light overflow-hidden box_rounded">
                                <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">Principal</p>
                                </div>
                            </a><a wire:click="btnCatSelect(2)" wire:loading.class="disabled" wire:target="btnCatSelect(2)" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                                <div class="bg-light overflow-hidden box_rounded">
                                <img src="{{ asset("img/ico/fda565cc36.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">Bebidas</p>
                                </div>
                            </a><a wire:click="btnCatSelect(3)" wire:loading.class="disabled" wire:target="btnCatSelect(3)" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                                <div class="bg-light overflow-hidden box_rounded">
                                <img src="{{ asset("img/ico/2cc86a7227.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">Snacks</p>
                                </div>
                            </a><a data-toggle="modal" data-target="#ModalOtrasVentas" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                            <div class="bg-light overflow-hidden box_rounded">
                            <img src="{{ asset("img/ico/4d87a6a1c0.png") }}" class="img-fluid">
                            </div>
                            <div class="ml-2">
                            <p class="mb-1 fw-bold text-dark">OTRAS VENTAS</p>
                            </div>
                        </a><a wire:click="BtnVentaEspecial()" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                            <div class="bg-light overflow-hidden box_rounded">
                            <img src="{{ asset("img/ico/2c2044f4e9.png") }}" class="img-fluid">
                            </div>
                            <div class="ml-2">
                            <p class="mb-1 fw-bold text-dark">Venta Especial</p>
                            </div>
                        </a></div>
            </div>
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
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><a wire:click="addOpcion(1)" title="Pan con Ajo" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/9c09a8ef2f.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">Pan con Ajo</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(2)" title="Tortilla" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/0ba9b3c54a.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">Tortilla</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a></div>
</div>
</section>
</div>



</div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-rounded" wire:click="omitirOpcion()">Omitir Opción <i class="fas fa-angle-double-right"></i></button>
    </div>
    </div>
</div>
</div><div class="modal" id="opcion-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OPCIONES DISPONIBLES</h5>

    </div>
    <div class="modal-body">

<div class="px-2 mt-4">   
<section class="bg-light body_rounded mt-n5 p-3">
        
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><a wire:click="addOpcion(3)" title="Pera" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/2c9fe9392d.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">Pera</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(4)" title="Melocoton" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/7301b7182b.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">Melocoton</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(5)" title="Frambuesa" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/23863255d8.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">Frambuesa</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(6)" title="Banano" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/29c71781f6.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">Banano</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(7)" title="Mandarina" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/0f0ca05115.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">Mandarina</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a></div>
</div>
</section>
</div>



</div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-rounded" wire:click="omitirOpcion()">Omitir Opción <i class="fas fa-angle-double-right"></i></button>
    </div>
    </div>
</div>
</div><div class="modal" id="opcion-3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OPCIONES DISPONIBLES</h5>

    </div>
    <div class="modal-body">

<div class="px-2 mt-4">   
<section class="bg-light body_rounded mt-n5 p-3">
        
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><a wire:click="addOpcion(8)" title="Termino Medio" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/be2deda503.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">Termino Medio</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(9)" title="Tres cuartos" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/be2deda503.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">Tres cuartos</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(10)" title="Bien Cocido" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/be2deda503.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">Bien Cocido</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a></div>
</div>
</section>
</div>



</div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-rounded" wire:click="omitirOpcion()">Omitir Opción <i class="fas fa-angle-double-right"></i></button>
    </div>
    </div>
</div>
</div>