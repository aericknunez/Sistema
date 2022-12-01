<div>

        <div class="px-2">
            <section class="bg-light body_rounded mt-n5 p-3">
        
                <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active click" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                
        
                    @foreach ($datos as $data)
                    <a wire:click="addProducto({{ $data->cod }})" wire:loading.class="disabled" wire:target="addProducto({{ $data->cod }})" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list pointer">
                        <div class="bg-light overflow-hidden box_rounded">
                        <img src="{{ asset('img/ico/' . $data->img) }}" class="img-fluid">
                        </div>
                        <div class="ml-2">
                        <p class="mb-1 fw-bold text-dark">{{ $data->nombre }}</p>
                        <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i>  <span class="mdi mdi-circle-medium"></span> {{ dinero($data->precio) }}</span></p>
                        

                        @if ($data->opciones_active == 1) 
                            <p class="small mb-0 text-muted text-left"><span class="bg-info font-weight-bold text-white rounded-3 py-1 px-2 small">Con Opciones</span></p>
                        @endif
        
                        </div>
                    </a>
                    @endforeach

                </div>
            </section>
        
        </div>



</div>