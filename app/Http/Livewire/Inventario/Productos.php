<?php

namespace App\Http\Livewire\Inventario;

use App\Common\Helpers;
use App\Models\InvAsignado;
use App\Models\InvDependiente;
use App\Models\Inventario;
use App\Models\User;
use Livewire\Component;

class Productos extends Component
{

    public $proPrincipales = [];

    public $productos = [];
    public $proSelected;

    protected $listeners = ['EliminarProducto' => 'destroy'];


    public $id_dependiente, $relacion, $idProd, $producto;




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
        $this->productos = InvDependiente::with('product')->with('product.medida')
                                            ->orderBy('id', 'DESC')->get();
    }




    public function btnAddProducto(){

        $this->validate([
            'producto' => 'required',
            'idProd' => 'required',
            'relacion' => 'required'
        ]);

        InvDependiente::updateOrCreate(
            ['id' => $this->id_dependiente],[
            'dependiente' => $this->producto, // nombre del dependiente
            'producto' => $this->idProd, // producto del que depende
            'relacion' => $this->relacion, // cantidad relacion
            'cantidad_descontar' => 1 / $this->relacion,
            
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => session('sistema.td')
        ]);

        $this->emit('creado');
        
        $this->reset(['id_dependiente','producto', 'relacion', 'idProd']);
        $this->getProductos();

    }


    public function seleccionarProducto($pro){
        $product = InvDependiente::find($pro);

        $this->id_dependiente = $product->id;
        $this->producto = $product->dependiente;
        $this->idProd = $product->producto;
        $this->relacion = $product->relacion;

    }


    public function destroy($id)
    {
        InvDependiente::find($id)->delete();
        InvAsignado::where('dependiente', $id)->delete();
        if (InvAsignado::count() > 0) {
            session(['invDesc' => true]);
        } else {
            session()->forget('invDesc');
        }

        $this->getProductos();

        $this->dispatchBrowserEvent('mensaje', 
        ['titulo' => 'Realizado', 
        'texto' => 'Producto Eliminado correctamente']);
    }









}
