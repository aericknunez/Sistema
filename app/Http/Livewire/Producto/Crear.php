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
use App\System\Config\ManejarIconos; // crea los iconos
use Livewire\Component;
use Livewire\WithPagination;

class Crear extends Component
{
    use ManejarIconos, ImagenesProductos, WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $opciones, $categorias, $paneles;

    public $producto_id;
    public $cod;
    public $nombre;
    public $categoria;
    public $precio_costo;
    public $precio_venta;
    public $gravado;
    public $opcionesSelect = [];
    public $panelSelect;
    public $imgSelected;
    public $opciones_active;
    
    protected $rules = [
        'nombre' => 'required|min:3',
        // 'precio_costo' => 'required|numeric',
        'precio_venta' => 'required|numeric'
    ];


    public function mount(){
        $this->getCategorias();
        $this->getOpciones();
        $this->getPaneles();
        $this->getCategoria();
        $this->imgSelected = "default.png";
        $this->gravado = 1;

    }

    public function render()
    {
        $iconos = $this->getAllIconos();
        return view('livewire.producto.crear', compact('iconos'));
    }


    public function store(){
        $this->validate();
        
        if ($this->opcionesSelect) {
            $this->opciones_active = 1;
        } else {
            $this->opciones_active = 0;
        }
        
        $this->getLastCod();

        $producto = Producto::create([
            'cod' => $this->cod,
            'nombre' => $this->nombre,
            'img' => $this->imgSelected,
            'tipo_icono' => 1,
            'precio_costo' => $this->precio_costo,
            'precio' => $this->precio_venta,
            'gravado' => $this->gravado,
            'especial' => NULL,
            'panel' => $this->panelSelect,
            'opciones_active' => $this->opciones_active,
            'producto_categoria_id' => $this->categoria,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => session('sistema.td')
        ]);

        // orden de la imagen
        OrderImg::create([
            'tipo_img' => 1,
            'imagen' => $producto->id,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => session('sistema.td')
        ]);

        // $producto->opciones()->attach($this->opcionesSelect);
        if ($this->opcionesSelect) {
            foreach ($this->opcionesSelect as $opcion) {
                if ($opcion) {
                    OpcionesProducto::create([
                        'producto_id' => $producto->id,
                        'opcion_id' => $opcion,
                        'clave' => Helpers::hashId(),
                        'tiempo' => Helpers::timeId(),
                        'td' => session('sistema.td')
                    ]);
                }
            }
        }

        $this->reset(['nombre', 'precio_costo', 'precio_venta']);
        $this->emit('creado'); // manda el mensaje de creado
        $this->CrearIconos(); // crea los iconos despues de guardar
    }


    public function getOpciones(){
        $this->opciones = Opciones::all();
    }

    public function getCategorias(){
        $this->categorias = ProductoCategoria::select(['nombre','id'])
                                            ->orderBy('id', 'asc')
                                            ->get();
    }

    public function getPaneles(){
        $this->paneles = ConfigPaneles::select(['nombre','id'])
                                        ->where('edo', 1)
                                        ->orderBy('id', 'asc')
                                        ->get();
    }

    public function getLastCod(){
        $codigo = Producto::select('cod')
                                ->orderBy('id', 'desc')
                                ->first();
        ($codigo) ? $this->cod = $codigo->cod + 1 :  $this->cod = 1000;
    }


    public function getCategoria(){
        $cat = ProductoCategoria::select(['id'])
                                        ->where('principal', 1)
                                        ->where('td', session('sistema.td'))
                                        ->first();
        $this->categoria = $cat->id;
    }

    public function selectImageTmp($imagen){
        $this->imgSelected = $imagen;
        $this->dispatchBrowserEvent('mensaje', 
        ['clase' => 'success', 
        'titulo' => 'Realizado', 
        'texto' => 'Imagen seleccionada']);
    }

    public function cerrarModalImg(){ // vacio de momento

    }


}
