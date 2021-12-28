<div class="container mb-4"> 
                    <div class="row justify-content-left click"><div class="mx-2 my-2">
                        <div class="newmenu text-center" >
                            <a  title="Hamburguesa" wire:click="addProducto(1000)">
                            <img src="{{ asset("img/ico/default.png") }}" class="img-fluid wow fadeIn rounded-circle border border-dark ">
                            <div class="menu-title text-truncate">Hamburguesa</div> 
                            </a>
                        </div>
                    </div> <div class="mx-2 my-2">
                            <div class="newmenu text-center" data-target="#categoria-2" data-toggle="modal">
                                <a title="Combos">
                                <img src="{{ asset("img/ico/0dbcffe255.png") }}" class="img-fluid wow fadeIn rounded-circle border border-dark ">
                                <div class="menu-title2 text-truncate">Combos</div> 
                                </a>
                            </div>
                    </div><div class="mx-2 my-2">
                        <div class="newmenu text-center" >
                            <a  title="Pupusa Loca" wire:click="addProducto(1002)">
                            <img src="{{ asset("img/ico/08b08be51d.png") }}" class="img-fluid wow fadeIn rounded-circle border border-dark ">
                            <div class="menu-title text-truncate">Pupusa Loca</div> 
                            </a>
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
<div class="row justify-content-center click"></div> 

</div>
    <div class="modal-footer">
        <button type="button" class="btn blue-gradient btn-rounded" data-dismiss="modal">Cerrar</button>
    </div>
    </div>
</div>
</div>