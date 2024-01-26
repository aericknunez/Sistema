<x-principal-layout>

    {{-- Contenido --}}
    <x-contenido >

        <div class="row justify-content-center">
            <img src="{{ asset('img/errors/caja.png') }}" alt="Error de Apertura"  class="img-fluid"><br>
        </div>
        {{-- Caja Seleccionada {{ session('caja_select') }} --}}
        <div class="row justify-content-center">
            {{ mensajex('No tiene acceso a esta sección por que no tiene una caja aperturada','info','<a href="'.route('caja.ordenes').'" class="btn btn-dark btn-rounded">Generar Ordenes</a>','<a class="btn btn-success btn-rounded" data-toggle="modal" data-target="#ModalAperturar">Aperturar Caja</a>') }}
        </div>

    </x-contenido>

    {{-- contenido  --}}
  
    
    @push('modals')


    <div class="modal" id="ModalAperturar" tabindex="-1" role="dialog" data-backdrop="true">
        <div class="modal-dialog modal-sm z-depth-4 bordeado-x1" role="document">
          <div class="modal-content bordeado-x1">
            <div class="modal-header">
              <h5 class="modal-title">APERTURAR CAJA</h5>
    
            </div>
            <div class="modal-body">
    
    
    
            <form action="{{ route('caja.aperturar') }}" method="POST">
                @csrf


                <div class="form-group green-border-focus">
                  <label for="efectivo_inicial">Efectivo Inicial</label>
                  <input type="number" step="any" min="0" id="efectivo_inicial" name="efectivo_inicial" class="form-control">
                </div>


                <div class="text-right">
                    <button class="btn btn-mdb-color" type="submit"><i class="fas fa-save mr-1"></i> Guardar</button>
                </div>
            </form>
    
    
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-rounded"  data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>



    @endpush


    @push('scripts')

    @endpush

</x-principal-layout>