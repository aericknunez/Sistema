<?php

namespace App\Http\Livewire\Efectivo;

use App\Common\Helpers;
use App\Models\EfectivoGastosCategorias;
use Livewire\Component;

class Categorias extends Component
{

    public $nombre;

    public $datos = [];

    protected $listeners = ['EliminarCategoria' => 'destroy']; // escucah el evento Eliminar


    public function mount(){
        $this->GetCategorias();
    }


    public function render()
    {
        return view('livewire.efectivo.categorias');
    }


    public function btnCategoria(){
        $this->validate(['nombre' => 'required|min:3']);

        EfectivoGastosCategorias::create([
            'categoria' => $this->nombre,
            'edo' => 1,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        $this->reset();
        $this->emit('creado'); // manda el mensaje de creado
        $this->GetCategorias();
    }

    public function getCategorias(){
        $this->datos = EfectivoGastosCategorias::where('edo', 1)
                                            ->orderBy('tiempo', 'desc')
                                            ->get();
    }

    public function destroy($id){

        if($id == 1){
            $this->emit('error'); // manda el mensaje de error al eliminar
        } else {
            $cat = EfectivoGastosCategorias::find($id);
            $cat->delete();  
            $this->dispatchBrowserEvent('mensaje', 
            ['clase' => 'success', 
            'titulo' => 'Realizado', 
            'texto' => 'Categoria Eliminada correctamente']);
            $this->GetCategorias();
        }

    }


}
