<div wire:ignore >
    
        <section class="near py-2 pl-3 bg-light">
            <div class="near_slider click"><a  wire:click="btnCatSelect(1)" wire:loading.class="disabled" wire:target="btnCatSelect(1)">
                            <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm pointer">
                            <img src="{{ asset("img/ico/default.png") }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                            <p class="mb-1 text-dark">Principal</p>
                            </div>
                        </a><a  wire:click="btnCatSelect(2)" wire:loading.class="disabled" wire:target="btnCatSelect(2)">
                            <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm pointer">
                            <img src="{{ asset("img/ico/0dbcffe255.png") }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                            <p class="mb-1 text-dark">Combos</p>
                            </div>
                        </a></div>
        </section>

</div>