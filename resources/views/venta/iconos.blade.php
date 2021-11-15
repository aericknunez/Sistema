<div class="container mb-4"> 
                    <div class="row justify-content-left click"><div class="mx-2 my-2">
                        <div class="newmenu text-center" >
                            <a  title="Hamburguesa de res" wire:click="addProducto(1000)">
                            <img src="{{ asset("img/ico/default.png") }}" class="img-fluid wow fadeIn rounded-circle border border-dark ">
                            <div class="menu-title text-truncate">Hamburguesa de res</div> 
                            </a>
                        </div>
                    </div> <div class="mx-2 my-2">
                            <div class="newmenu text-center" data-target="#categoria-2" data-toggle="modal">
                                <a title="Postres">
                                <img src="{{ asset("img/ico/57f37275f0.png") }}" class="img-fluid wow fadeIn rounded-circle border border-dark ">
                                <div class="menu-title2 text-truncate">Postres</div> 
                                </a>
                            </div>
                    </div><div class="mx-2 my-2">
                        <div class="newmenu text-center" >
                            <a  title="Piza Familiar" wire:click="addProducto(1002)">
                            <img src="{{ asset("img/ico/29ee951b82.png") }}" class="img-fluid wow fadeIn rounded-circle border border-dark ">
                            <div class="menu-title text-truncate">Piza Familiar</div> 
                            </a>
                        </div>
                    </div> <div class="mx-2 my-2">
                        <div class="newmenu text-center" >
                            <a  title="Pepsi Lata" wire:click="addProducto(1003)">
                            <img src="{{ asset("img/ico/3179e2ea7a.png") }}" class="img-fluid wow fadeIn rounded-circle border border-dark ">
                            <div class="menu-title text-truncate">Pepsi Lata</div> 
                            </a>
                        </div>
                    </div> 
        </div> 
    </div><div class="modal" id="opcion-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-md z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SELECCIONE UNA OPCION</h5>

    </div>
    <div class="modal-body">
<div class="row justify-content-center click"><div class="mx-2 my-2">
                        <div class="newmenu text-center" wire:click="addOpcion(1)">
                            <a>
                            <img src="{{ asset("img/ico/5f4615dbc5.png") }}" class="img-fluid wow fadeIn rounded-circle border border-dark ">
                            <div class="menu-titleC">Termino Medio</div> 
                            </a>
                        </div>
                    </div><div class="mx-2 my-2">
                        <div class="newmenu text-center" wire:click="addOpcion(2)">
                            <a>
                            <img src="{{ asset("img/ico/5f4615dbc5.png") }}" class="img-fluid wow fadeIn rounded-circle border border-dark ">
                            <div class="menu-titleC">Tres Cuartos</div> 
                            </a>
                        </div>
                    </div><div class="mx-2 my-2">
                        <div class="newmenu text-center" wire:click="addOpcion(3)">
                            <a>
                            <img src="{{ asset("img/ico/5f4615dbc5.png") }}" class="img-fluid wow fadeIn rounded-circle border border-dark ">
                            <div class="menu-titleC">Bien Cocida</div> 
                            </a>
                        </div>
                    </div></div> 

</div>
    <div class="modal-footer">
        <button type="button" class="btn blue-gradient btn-rounded" wire:click="omitirOpcion()">Omitir Opción <i class="fas fa-angle-double-right"></i></button>
    </div>
    </div>
</div>
</div><div class="modal" id="categoria-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="false">
<div class="modal-dialog modal-sm z-depth-4 bordeado-x1" role="document">
    <div class="modal-content bordeado-x1">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SELECCIONE UN PRODUCTO</h5>

    </div>
    <div class="modal-body">
<div class="row justify-content-center click"><div class="mx-2 my-2">
                        <div class="newmenu text-center" >
                            <a  title="Paleta de Fresa" wire:click="addProducto(1004)">
                            <img src="{{ asset("img/ico/3c5a85b2e7.png") }}" class="img-fluid wow fadeIn rounded-circle border border-dark ">
                            <div class="menu-title text-truncate">Paleta de Fresa</div> 
                            </a>
                        </div>
                    </div> </div> 

</div>
    <div class="modal-footer">
        <button type="button" class="btn blue-gradient btn-rounded" data-dismiss="modal">Cerrar</button>
    </div>
    </div>
</div>
</div>