<?php

namespace App\Http\Livewire\Inventario;

use App\Models\Producto;
use Livewire\Component;

class Asignados extends Component
{

    public $proIco;


    public function mount(){
        $this->getProductosIcon();
    }

    public function render()
    {
        return view('livewire.inventario.asignados');
    }


    public function getProductosIcon(){
        $this->proIco = Producto::all();
    }





}
