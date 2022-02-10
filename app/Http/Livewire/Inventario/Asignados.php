<?php

namespace App\Http\Livewire\Inventario;

use App\Common\Helpers;
use App\Models\InvAsignado;
use App\Models\InvDependiente;
use App\Models\Producto;
use Livewire\Component;

class Asignados extends Component
{

    public $proIco;
    public $proSelect;
    public $dependientes;


    public $idProd, $dependiente;



    public function mount(){
        $this->getProductosIcon();
        $this->getProductos();
    }



    public function render()
    {
        return view('livewire.inventario.asignados');
    }


    public function getProductosIcon(){ // lsita de productos iconos con os dependientes asignados
        $this->proIco = Producto::with('asignados.dependientes')->latest('id')->get();
    }


    public function getProductos(){ // lista de prodcutos dependientes para el select
        $this->dependientes = InvDependiente::orderBy('id', 'DESC')->get();
    }



    public function seleccionarProducto($iden){ // producto con los dependientes asignados 
        $this->idProd = $iden;
        $this->misDependientes($iden);
        $this->emit('addModal');
    }

    public function misDependientes($iden){
        $this->proSelect = InvAsignado::with('dependientes')->where('producto', $iden)->orderBy('dependiente', 'DESC')->get();
    }





    public function btnAddAsignado(){
        if ($this->dependiente) {
            InvAsignado::create([
                'dependiente' => $this->dependiente,
                'producto' => $this->idProd,

                'clave' => Helpers::hashId(),
                'tiempo' => Helpers::timeId(),
                'td' => config('sistema.td')
            ]);

            $this->emit('creado');
            $this->reset(['dependiente']);
            session(['invDesc' => true]);
            $this->misDependientes($this->idProd);
            $this->getProductosIcon();
    
        } else {
            $this->dispatchBrowserEvent('error', 
            ['titulo' => 'error', 
            'texto' => 'Debe seleccionar un producto para continuar']);
        }
    }


    public function delAsignado($iden){
        InvAsignado::find($iden)->delete();
        $this->dispatchBrowserEvent('mensaje', 
        ['titulo' => 'Realizado', 
        'texto' => 'Producto Eliminado correctamente']);

        if (InvAsignado::count() > 0) {
            session(['invDesc' => true]);
        } else {
            session()->forget('invDesc');
        }
        $this->misDependientes($this->idProd);
        $this->getProductosIcon();
    }




}
