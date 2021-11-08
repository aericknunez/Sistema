<?php

namespace App\Http\Livewire\Producto;

use App\Common\Helpers;
use App\Models\Opciones;
use App\Models\OpcionesProducto;
use App\Models\Producto;
use App\System\Config\ManejarIconos;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination, ManejarIconos;
    
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['EliminarProducto' => 'destroy'];

    public $productId;
    public $precio, $nombre;
    public $opciones = [];
    public $OpAgregados = [];

    public function mount(){
        $this->getOpciones();
    }

    public function render()
    {
        $productos = $this->getProductos();
        return view('livewire.producto.index', compact('productos'));
    }

    public function destroy($id)
    {
        Producto::find($id)->delete();
        
        $this->CrearIconos(); // crea los iconos despues de guardar
        $this->dispatchBrowserEvent('mensaje', 
        ['clase' => 'success', 
        'titulo' => 'Realizado', 
        'texto' => 'Producto Eliminado correctamente']);
    }


    public function getProductos(){
        return  Producto::latest('id')
                        ->with('opciones')
                        ->with('categoria')
                        ->paginate(6);
    }

    public function selectProduct($iden){
        $this->productId = $iden;
        $this->getOpcionesProducto();
    }

    public function updatePrecio(){
        Producto::where('id', $this->productId)->update(['precio' => $this->precio]);

        $this->reset();
        $this->dispatchBrowserEvent('closeModal', ['modal' => 'ModalPrecio']);
        $this->mensajeModificado();
    }

    public function updateNombre(){
        Producto::where('id', $this->productId)->update(['nombre' => $this->nombre]);

        $this->reset();
        $this->dispatchBrowserEvent('closeModal', ['modal' => 'ModalNombre']);
        $this->mensajeModificado();
    }

    public function addOpcion($opcion){
        OpcionesProducto::create([
            'producto_id' => $this->productId,
            'opcion_id' => $opcion,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
        $this->updateOpcionesActive();
        $this->getOpcionesProducto();
        $this->mensajeModificado();
    }

    public function delOpcion($iden){
        OpcionesProducto::find($iden)->delete();
        $this->updateOpcionesActive();
        $this->getOpcionesProducto();
        $this->mensajeModificado();
    }



    public function mensajeModificado(){
        $this->dispatchBrowserEvent('mensaje', 
            ['clase' => 'success', 
            'titulo' => 'Realizado', 
            'texto' => 'Producto Modificado correctamente']);
    }



    public function getOpciones(){
        $this->opciones = Opciones::all();
    }

    public function getOpcionesProducto(){
        $this->OpAgregados = OpcionesProducto::addSelect(['nombre_opcion' => Opciones::select('nombre')
                                                ->whereColumn('opcion_id', 'opciones.id')])
                                                ->where('producto_id', $this->productId)
                                                ->get();
    }

    
    public function updateOpcionesActive(){
        $cantidad = OpcionesProducto::where('producto_id', $this->productId)->count();
        if($cantidad > 0){
            Producto::where('id',$this->productId)->update(['opciones_active' => 1]);
        } else { 
            Producto::where('id',$this->productId)->update(['opciones_active' => 0]);
        }
    }





}
