<?php

namespace App\Http\Livewire\Producto;

use App\Common\Helpers;
use App\Models\ConfigPaneles;
use App\Models\Opciones;
use App\Models\OpcionesProducto;
use App\Models\OrderImg;
use App\Models\Producto;
use App\Models\ProductoCategoria;
use App\System\Config\ImagenesProductos;
use App\System\Config\ManejarIconos;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination, ManejarIconos, ImagenesProductos;
    
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['EliminarProducto' => 'destroy'];

    public $productId;
    public $precio, $nombre;
    public $opciones = [];
    public $OpAgregados = [];
    public $categorias = [];
    public $paneles = [];


    public $imgSelected;
    public $productos;


    public function hydrate() {
        $this->getOpciones();
        $this->getCategorias();
        $this->getPaneles();
        
    }

    public function mount(){
        $this->getOpciones();
        $this->getCategorias();
        $this->getPaneles();
        $this->getProductos();
    }



    public function render(){
        $this->getProductos();
        $iconos = $this->getAllIconos();
        return view('livewire.producto.index', compact('iconos'));
    }

    public function destroy($id)
    {
        Producto::find($id)->delete();
        OrderImg::where('tipo_img', 1)->where('imagen', $id)->delete();

        $this->CrearIconos(); // crea los iconos despues de guardar
        $this->dispatchBrowserEvent('mensaje', 
        ['clase' => 'success', 
        'titulo' => 'Realizado', 
        'texto' => 'Producto Eliminado correctamente']);
    }


    public function getProductos(){
            $this->productos =  Producto::latest('id')
                            ->with('opciones')
                            ->with('categoria')
                            ->with('paneles')
                            ->get();

    }

    public function selectProduct($iden){
        $this->productId = $iden;
        $this->getOpcionesProducto();
    }

    public function updatePrecio(){
        Producto::where('id', $this->productId)->update(['precio' => $this->precio, 'tiempo' => Helpers::timeId()]);

        $this->reset();
        $this->dispatchBrowserEvent('closeModal', ['modal' => 'ModalPrecio']);
        $this->mensajeModificado();
    }

    public function updateNombre(){
        Producto::where('id', $this->productId)->update(['nombre' => $this->nombre, 'tiempo' => Helpers::timeId()]);

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


    public function getPaneles(){
        $this->paneles = ConfigPaneles::where('edo', 1)->get();
    }



    public function addPanel($iden = NULL){
        Producto::where('id', $this->productId)->update(['panel' => $iden, 'tiempo' => Helpers::timeId()]);
        
        $this->dispatchBrowserEvent('closeModal', ['modal' => 'ModalPanel']);
        $this->mensajeModificado();
    }



    
    public function updateOpcionesActive(){
        $cantidad = OpcionesProducto::where('producto_id', $this->productId)->count();
        if($cantidad > 0){
            Producto::where('id',$this->productId)->update(['opciones_active' => 1, 'tiempo' => Helpers::timeId()]);
        } else { 
            Producto::where('id',$this->productId)->update(['opciones_active' => 0, 'tiempo' => Helpers::timeId()]);
        }
    }


    public function getCategorias(){
        $this->categorias = ProductoCategoria::all();
    }



    public function addCategoria($iden){
        Producto::where('id', $this->productId)->update(['producto_categoria_id' => $iden, 'tiempo' => Helpers::timeId()]);
        
        $this->dispatchBrowserEvent('closeModal', ['modal' => 'ModalCategoria']);
        $this->mensajeModificado();
        $this->CrearIconos(); // crea los iconos despues de guardar
    }






    public function seleccionarProducto($iden){ // levanta el modal de los iconos
        $this->productId = $iden;
    }

    public function selectImageTmp($imagen){
        $this->imgSelected = $imagen;

        Producto::where('id',$this->productId)->update(['img' => $this->imgSelected, 'tiempo' => Helpers::timeId()]);

        $this->CrearIconos(); // crea los iconos despues de guardar

        $this->resetPage();
        
        $this->dispatchBrowserEvent('mensaje', 
        ['clase' => 'success', 
        'titulo' => 'Realizado', 
        'texto' => 'Imagen cambiada Correctamente']);
    }

    public function cerrarModalImg(){
        $this->resetPage();
        $this->reset(); // quito la opcion de seleccionar imagen     
    }


    public function btnCrearIconos(){
        $this->CrearIconos(); // crea los iconos despues de guardar
        $this->dispatchBrowserEvent('mensaje', 
        ['clase' => 'success', 
        'titulo' => 'Realizado', 
        'texto' => 'Iconos Creados Correctamente']);
    }



}
