<?php

namespace App\Http\Livewire\Inventario;

use App\Common\Helpers;
use App\Models\InvDependiente;
use App\Models\Inventario;
use Livewire\Component;

class Productos extends Component
{

    public $proPrincipales = [];

    public $productos = [];


    public $relacion, $idProd, $producto, $cantidad;




    public function mount(){
        $this->getProPricipales();
        $this->getProductos();
    }


    public function render()
    {
        return view('livewire.inventario.productos');
    }


    public function getProPricipales(){
        $this->proPrincipales = Inventario::select('id', 'producto')->get();
    }

    public function getProductos(){
        $this->productos = InvDependiente::orderBy('id', 'DESC')->get();
    }




    public function btnAddProducto(){

        InvDependiente::create([
            'dependiente' => $this->producto,
            'producto' => $this->idProd,
            'cantidad_descontar' => $this->cantidad = 1 / $this->relacion,
            
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        $this->emit('creado');
        
        $this->reset(['producto', 'cantidad', 'relacion', 'idProd']);
        $this->getProductos();

    }












}
