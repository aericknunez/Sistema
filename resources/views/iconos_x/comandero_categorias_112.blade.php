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
                                <img src="{{ asset("img/ico/52af06e808.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">BEBIDAS</p>
                                </div>
                            </a><a wire:click="btnCatSelect(3)" wire:loading.class="disabled" wire:target="btnCatSelect(3)" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                                <div class="bg-light overflow-hidden box_rounded">
                                <img src="{{ asset("img/ico/64ed5dc5f9.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">ENTRADAS</p>
                                </div>
                            </a><a wire:click="btnCatSelect(4)" wire:loading.class="disabled" wire:target="btnCatSelect(4)" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                                <div class="bg-light overflow-hidden box_rounded">
                                <img src="{{ asset("img/ico/e6b5ca0d79.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">PLATOS FUERTES</p>
                                </div>
                            </a><a wire:click="btnCatSelect(5)" wire:loading.class="disabled" wire:target="btnCatSelect(5)" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                                <div class="bg-light overflow-hidden box_rounded">
                                <img src="{{ asset("img/ico/2d2bafc7f4.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">COMIDA MEXICANA</p>
                                </div>
                            </a><a wire:click="btnCatSelect(6)" wire:loading.class="disabled" wire:target="btnCatSelect(6)" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                                <div class="bg-light overflow-hidden box_rounded">
                                <img src="{{ asset("img/ico/24754753da.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">PIZZA</p>
                                </div>
                            </a><a wire:click="btnCatSelect(7)" wire:loading.class="disabled" wire:target="btnCatSelect(7)" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                                <div class="bg-light overflow-hidden box_rounded">
                                <img src="{{ asset("img/ico/c188b2d490.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">EXTRAS</p>
                                </div>
                            </a><a wire:click="btnCatSelect(8)" wire:loading.class="disabled" wire:target="btnCatSelect(8)" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                                <div class="bg-light overflow-hidden box_rounded">
                                <img src="{{ asset("img/ico/7eb4408630.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">MENU INFANTIL</p>
                                </div>
                            </a><a wire:click="btnCatSelect(9)" wire:loading.class="disabled" wire:target="btnCatSelect(9)" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                                <div class="bg-light overflow-hidden box_rounded">
                                <img src="{{ asset("img/ico/da50a39189.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">PLATO DEL DIA</p>
                                </div>
                            </a><a wire:click="btnCatSelect(10)" wire:loading.class="disabled" wire:target="btnCatSelect(10)" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                                <div class="bg-light overflow-hidden box_rounded">
                                <img src="{{ asset("img/ico/f909aac81c.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">POSTRES</p>
                                </div>
                            </a><a wire:click="btnCatSelect(11)" wire:loading.class="disabled" wire:target="btnCatSelect(11)" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                                <div class="bg-light overflow-hidden box_rounded">
                                <img src="{{ asset("img/ico/6983cb8acc.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">MENU EMPLEADOS</p>
                                </div>
                            </a><a wire:click="btnCatSelect(12)" wire:loading.class="disabled" wire:target="btnCatSelect(12)" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                                <div class="bg-light overflow-hidden box_rounded">
                                <img src="{{ asset("img/ico/db4242bdc4.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">SOPAS PASTAS Y ENSALADAS</p>
                                </div>
                            </a><a wire:click="btnCatSelect(13)" wire:loading.class="disabled" wire:target="btnCatSelect(13)" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                                <div class="bg-light overflow-hidden box_rounded">
                                <img src="{{ asset("img/ico/b334a1e1dc.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">ESPECIALIDADES</p>
                                </div>
                            </a><a wire:click="btnCatSelect(14)" wire:loading.class="disabled" wire:target="btnCatSelect(14)" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                                <div class="bg-light overflow-hidden box_rounded">
                                <img src="{{ asset("img/ico/7cc1ba5be4.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">PARRILLADAS</p>
                                </div>
                            </a><a wire:click="btnCatSelect(15)" wire:loading.class="disabled" wire:target="btnCatSelect(15)" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                                <div class="bg-light overflow-hidden box_rounded">
                                <img src="{{ asset("img/ico/f5773f7641.png") }}" class="img-fluid">
                                </div>
                                <div class="ml-2">
                                <p class="mb-1 fw-bold text-dark">MENU ESPECIAL</p>
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
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><a wire:click="addOpcion(1)" title="pan" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/a816f96b7b.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">pan</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(2)" title="tortilla" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/a816f96b7b.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">tortilla</p>
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
</div><div class="modal" id="opcion-4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OPCIONES DISPONIBLES</h5>

    </div>
    <div class="modal-body">

<div class="px-2 mt-4">   
<section class="bg-light body_rounded mt-n5 p-3">
        
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><a wire:click="addOpcion(3)" title="medio" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">medio</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(4)" title="3/4" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">3/4</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(5)" title="normal" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">normal</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(6)" title="bien cocido" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">bien cocido</p>
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
</div><div class="modal" id="opcion-5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OPCIONES DISPONIBLES</h5>

    </div>
    <div class="modal-body">

<div class="px-2 mt-4">   
<section class="bg-light body_rounded mt-n5 p-3">
        
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><a wire:click="addOpcion(7)" title="buffalo" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">buffalo</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(8)" title="bbq" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">bbq</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(9)" title="sin salsa" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">sin salsa</p>
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
</div><div class="modal" id="opcion-6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OPCIONES DISPONIBLES</h5>

    </div>
    <div class="modal-body">

<div class="px-2 mt-4">   
<section class="bg-light body_rounded mt-n5 p-3">
        
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><a wire:click="addOpcion(10)" title="peperoni" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">peperoni</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(11)" title="jamon" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">jamon</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(12)" title="salami" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">salami</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(13)" title="chorizo" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">chorizo</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(14)" title="carne" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">carne</p>
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
</div><div class="modal" id="opcion-7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OPCIONES DISPONIBLES</h5>

    </div>
    <div class="modal-body">

<div class="px-2 mt-4">   
<section class="bg-light body_rounded mt-n5 p-3">
        
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><a wire:click="addOpcion(15)" title="Papaya" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">Papaya</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(16)" title="melon" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">melon</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(17)" title="sandia" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">sandia</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(18)" title="fresa" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">fresa</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(19)" title="guineo" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">guineo</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(20)" title="piña" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">piña</p>
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
</div><div class="modal" id="opcion-8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OPCIONES DISPONIBLES</h5>

    </div>
    <div class="modal-body">

<div class="px-2 mt-4">   
<section class="bg-light body_rounded mt-n5 p-3">
        
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><a wire:click="addOpcion(21)" title="suprema" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">suprema</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(22)" title="hawaiana" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">hawaiana</p>
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
</div><div class="modal" id="opcion-9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OPCIONES DISPONIBLES</h5>

    </div>
    <div class="modal-body">

<div class="px-2 mt-4">   
<section class="bg-light body_rounded mt-n5 p-3">
        
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><a wire:click="addOpcion(24)" title="hiervabuena" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">hiervabuena</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(25)" title="fresa" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">fresa</p>
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
</div><div class="modal" id="opcion-10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OPCIONES DISPONIBLES</h5>

    </div>
    <div class="modal-body">

<div class="px-2 mt-4">   
<section class="bg-light body_rounded mt-n5 p-3">
        
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><a wire:click="addOpcion(26)" title="plancha" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">plancha</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(27)" title="ajillo" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">ajillo</p>
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
</div><div class="modal" id="opcion-11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OPCIONES DISPONIBLES</h5>

    </div>
    <div class="modal-body">

<div class="px-2 mt-4">   
<section class="bg-light body_rounded mt-n5 p-3">
        
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><a wire:click="addOpcion(28)" title="diabla" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">diabla</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(29)" title="empanizados" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">empanizados</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(30)" title="gratinados" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">gratinados</p>
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
</div><div class="modal" id="opcion-12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OPCIONES DISPONIBLES</h5>

    </div>
    <div class="modal-body">

<div class="px-2 mt-4">   
<section class="bg-light body_rounded mt-n5 p-3">
        
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><a wire:click="addOpcion(31)" title="JALAPEÑA" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/30cf8e1c18.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">JALAPEÑA</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(32)" title="QUESO" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/497b6da6ce.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">QUESO</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(33)" title="HONGOS" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/09be228de9.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">HONGOS</p>
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
</div><div class="modal" id="opcion-13" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OPCIONES DISPONIBLES</h5>

    </div>
    <div class="modal-body">

<div class="px-2 mt-4">   
<section class="bg-light body_rounded mt-n5 p-3">
        
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><a wire:click="addOpcion(34)" title="revueltos" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">revueltos</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(35)" title="estrellados" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/default.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">estrellados</p>
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
</div><div class="modal" id="opcion-14" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">OPCIONES DISPONIBLES</h5>

    </div>
    <div class="modal-body">

<div class="px-2 mt-4">   
<section class="bg-light body_rounded mt-n5 p-3">
        
<div class="tab-content" id="pills-tabContent">
<div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"><a wire:click="addOpcion(36)" title="ajillo" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/2d4ded184e.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">ajillo</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(37)" title="plancha" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/2d4ded184e.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">plancha</p>
                    <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> </span></p>
                    
                    </div>
        </a><a wire:click="addOpcion(38)" title="empanizada" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                    <div class="bg-light overflow-hidden box_rounded">
                    <img src="{{ asset("img/ico/2d4ded184e.png") }}" class="img-fluid">
                    </div>
                    <div class="ml-2">
                    <p class="mb-1 fw-bold text-dark">empanizada</p>
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