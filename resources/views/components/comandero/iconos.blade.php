<div>
    
    <section class="near py-2 pl-3 bg-light">

    
        <div class="near_slider">
        
            @for ($i=1; $i <= 5; $i++)
                <a href="#">
                    <div class="near_item bg-white box_rounded mr-2 p-3 text-center my-1 shadow-sm">
                     <img src="{{ asset('img/ico/03925a9726.png') }}" width="80" height="80" class="img-fluid mx-auto mb-1 rounded-pill">
                     <p class="mb-1 text-dark">Cake & Shakea</p>
                    </div>
                </a>   
            @endfor
              
            </div>
        </section>




        <div class="px-2">
            <section class="bg-light body_rounded mt-n5 p-3">
        
                <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                
        
                    @for ($i=1; $i <= 5; $i++)

                        <a href="#" class="d-flex align-items-center bg-white box_rounded p-2 mb-2 shadow-sm osahan-list">
                        <div class="bg-light overflow-hidden box_rounded">
                        <img src="{{ asset('img/ico/03925a9726.png') }}" class="img-fluid">
                        </div>
                        <div class="ml-2">
                        <p class="mb-1 fw-bold text-dark">Cake & Shakea</p>
                        <p class="small mb-2"><span class="text-muted"> <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-silverware-fork-knife mr-1"></i> Burger <span class="mdi mdi-circle-medium"></span> <i class="mdi mdi-currency-usd"></i> 3.25</span></p>
                        
                        <p class="small mb-0 text-muted text-left"><span class="bg-info font-weight-bold text-white rounded-3 py-1 px-2 small">Con Opciones</span></p>
        
                        </div>
                        </a>
                    @endfor

                </div>
            </section>
        
        </div>




</div>