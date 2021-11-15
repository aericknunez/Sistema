<?php

namespace App\Http\Livewire\Categoria;

use App\Common\Helpers;
use App\Models\OrderImg;
use App\Models\ProductoCategoria;
use App\System\Config\ImagenesProductos;
use App\System\Config\ManejarIconos;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use ManejarIconos, ImagenesProductos, WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $categorias;
    public $imgSelected, $category_id, $nombre;
    public $openForm;


    protected $rules = [
        'nombre' => 'required|min:3'
    ];

    protected $listeners = ['EliminarCategoria' => 'destroy'];



    public function mount(){
        $this->openForm = false;
        $this->getCategorias();
        $this->imgSelected = "default.png";
    }

    public function render()
    {
        $iconos = $this->getAllIconos();
        return view('livewire.categoria.index', compact('iconos'));
    }


    public function store()
    {
        $this->validate();
        
        $categoria = ProductoCategoria::updateOrCreate(
            ['id' => $this->category_id],[
            'nombre' => $this->nombre,
            'img' => $this->imgSelected,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        // orden de la imagen
        OrderImg::updateOrCreate(
            ['imagen' => $categoria->id],[
            'tipo_img' => 2,
            'imagen' => $categoria->id,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);

        $this->CrearIconos(); // crea los iconos despues de guardar

        $this->reset(['nombre', 'category_id']);
        $this->getCategorias();
    }


    public function editar($cat){ /// se buscan los registros para pintarlos en los formularios al asignarles valores a los input
    
        $category = ProductoCategoria::findOrFail($cat);
        $this->category_id = $cat;
        $this->nombre = $category->nombre;
        $this->imgSelected = $category->img;

        $this->openForm = true;
    }


    public function destroy($id)
    {
        ProductoCategoria::find($id)->delete();
        OrderImg::where('tipo_img', 2)->where('imagen', $id)->delete();

        $this->getCategorias();
        $this->CrearIconos(); // crea los iconos despues de guardar
        
        $this->dispatchBrowserEvent('mensaje', 
        ['clase' => 'success', 
        'titulo' => 'Realizado', 
        'texto' => 'Categoria Eliminada correctamente']);
    }



    public function getCategorias(){
        $this->categorias = ProductoCategoria::where('principal', NULL)->get();
    }


    public function selectImageTmp($imagen){
        $this->imgSelected = $imagen;
        $this->dispatchBrowserEvent('mensaje', 
        ['clase' => 'success', 
        'titulo' => 'Realizado', 
        'texto' => 'Imagen seleccionada']);
    }


    public function newForm(){
        if ($this->openForm == true) {
            $this->openForm = false;
        } else {
            $this->openForm = true;
        }
        $this->reset(['nombre', 'category_id']);
    }


    public function cerrarModalImg(){ // vacio de momento

    }


}
