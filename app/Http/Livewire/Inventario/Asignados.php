<?php

namespace App\Http\Livewire\Inventario;

use App\Models\InvAsignado;
use App\Models\InvDependiente;
use App\Models\Producto;
use Livewire\Component;

class Asignados extends Component
{

    public $proIco;
    public $proSelect;

    public function mount(){
        $this->getProductosIcon();
    }

    public function render()
    {
        return view('livewire.inventario.asignados');
    }


    public function getProductosIcon(){
        $this->proIco = Producto::with('asignados.dependientes')->latest('id')->get();
    }



    public function seleccionarProducto($iden){

        $this->proSelect = InvAsignado::with('dependientes')->where('producto', $iden)->get();
        // $this->proSelect = Producto::with('asignados.dependientes')->where('id', $iden)->get();
    }




}
