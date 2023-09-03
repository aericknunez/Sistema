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
                            </a></div>
            </div>
        </section>

</div>