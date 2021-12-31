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
    public $toImg;


    public function hydrate() {
        $this->getOpciones();
        $this->getCategorias();
        $this->getPaneles();
    }

    public function mount(){
        $this->getOpciones();
        $this->getCategorias();
        $this->getPaneles();
    }



    public function updatingIconos() // actualiza el numero de paginas al escribir
    {
        $this->resetPage();
    }

    public function render(){
        if (!$this->toImg) {
            $productos = $this->getProductos();
        } else {
            $productos = [];
        }
        $iconos = $this->getAllIconos();
        return view('livewire.producto.index', compact('productos', 'iconos'));
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
        return  Producto::latest('id')
                        ->with('opciones')
                        ->with('categoria')
                        ->with('paneles')
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


    public function getPaneles(){
        $this->paneles = ConfigPaneles::where('edo', 1)->get();
    }



    public function addPanel($iden = NULL){
        Producto::where('id', $this->productId)->update(['panel' => $iden]);
        
        $this->dispatchBrowserEvent('closeModal', ['modal' => 'ModalPanel']);
        $this->mensajeModificado();
    }



    
    public function updateOpcionesActive(){
        $cantidad = OpcionesProducto::where('producto_id', $this->productId)->count();
        if($cantidad > 0){
            Producto::where('id',$this->productId)->update(['opciones_active' => 1]);
        } else { 
            Producto::where('id',$this->productId)->update(['opciones_active' => 0]);
        }
    }


    public function getCategorias(){
        $this->categorias = ProductoCategoria::all();
    }



    public function addCategoria($iden){
        Producto::where('id', $this->productId)->update(['producto_categoria_id' => $iden]);
        
        $this->dispatchBrowserEvent('closeModal', ['modal' => 'ModalCategoria']);
        $this->mensajeModificado();
        $this->CrearIconos(); // crea los iconos despues de guardar
    }






    public function seleccionarProducto($iden){
        $this->productId = $iden;
        $this->toImg = TRUE; // si voy a seleccionar una imagen para no mostrar los productos
    }

    public function selectImageTmp($imagen){
        $this->imgSelected = $imagen;

        Producto::where('id',$this->productId)->update(['img' => $this->imgSelected]);

        $this->CrearIconos(); // crea los iconos despues de guardar

        $this->resetPage();
        $this->reset('toImg'); // quito la opcion de seleccionar imagen
        
        $this->dispatchBrowserEvent('mensaje', 
        ['clase' => 'success', 
        'titulo' => 'Realizado', 
        'texto' => 'Imagen cambiada Correctamente']);
    }

    public function cerrarModalImg(){
        $this->resetPage();
        $this->reset('toImg'); // quito la opcion de seleccionar imagen     
    }


    public function btnCrearIconos(){
        $this->CrearIconos(); // crea los iconos despues de guardar
        $this->dispatchBrowserEvent('mensaje', 
        ['clase' => 'success', 
        'titulo' => 'Realizado', 
        'texto' => 'Iconos Creados Correctamente']);
    }



}
