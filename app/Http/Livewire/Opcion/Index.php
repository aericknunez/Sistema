<?php

namespace App\Http\Livewire\Opcion;

use App\Common\Helpers;
use App\Models\Opciones;
use App\Models\OpcionesSub;
use App\System\Config\ImagenesProductos;
use App\System\Config\ManejarIconos;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use ManejarIconos, ImagenesProductos, WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $opciones;

    public $nombre, $option_id; // opciones

    public $imgSelected, $subopcion_id, $subopcion, $precio; // subOpciones
    public $optionx; // id de la opcion para insertar sub op
    public $opcionSelect; // objeto obcion selecct
    public $openFormOptions;


    public $openForm;


    protected $rules = [
        'nombre' => 'required|min:3'
    ];

    protected $listeners = ['EliminarOpcion' => 'destroy'];



    public function mount(){
        $this->openForm = false;
        $this->openFormOptions = false;
        $this->getOpciones();
        $this->imgSelected = "default.png";
    }

    

    public function render()
    {
        $iconos = $this->getAllIconos();
        return view('livewire.opcion.index', compact('iconos'));
    }



    public function store()
    {
        $this->validate();
        
        $optionx = Opciones::updateOrCreate(
            ['id' => $this->option_id],[
            'nombre' => $this->nombre,
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => session('sistema.td')
        ]);

        $this->CrearIconos(); // crea los iconos despues de guardar
        $this->reset(['nombre', 'option_id']);
        $this->getOpciones();

        $this->optionx = $optionx->id;
        $this->getOpcionesSub($this->optionx);
        $this->openFormOptions =  true;
        $this->openForm = false;

        $this->emit('creado'); // manda el mensaje de creado
    }

    public function storeOption()
    {
        $this->validate([
            'subopcion' => 'required|min:3',
        ]);
        
        OpcionesSub::updateOrCreate(
            ['id' => $this->subopcion_id],[
            'nombre' => $this->subopcion,
            'img' => $this->imgSelected,
            'precio' => $this->precio,
            'opcion_id' => $this->optionx, // opcion primaria
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => session('sistema.td')
        ]);

        $this->CrearIconos(); // crea los iconos despues de guardar

        $this->reset(['precio', 'subopcion_id', 'subopcion']);
        $this->getOpciones();
        $this->getOpcionesSub($this->optionx);
        $this->openFormOptions =  true;

    }

    public function editar($opt){ /// se buscan los registros para pintarlos en los formularios al asignarles valores a los input
    
        $this->optionx = $opt;
        $this->getOpcionesSub($opt);

        $this->openForm = false; 
        $this->openFormOptions = true;
    }


    public function destroy($id)
    {
        $option = Opciones::findOrFail($id);
        $option->delete();
        $this->CrearIconos(); // crea los iconos despues de guardar

        $this->getOpciones();

        $this->dispatchBrowserEvent('mensaje', 
        ['clase' => 'success', 
        'titulo' => 'Realizado', 
        'texto' => 'Modificador Eliminado correctamente']);
    }

    public function destroySubOpcion($id)
    {
        $option = OpcionesSub::find($id);
        $option->delete();
        $this->CrearIconos(); // crea los iconos despues de guardar

        $this->getOpciones();
        $this->getOpcionesSub($this->optionx);

        $this->dispatchBrowserEvent('mensaje', 
        ['clase' => 'success', 
        'titulo' => 'Realizado', 
        'texto' => 'Opcion Eliminada correctamente']);
    }


    public function getOpciones(){
        $this->opciones = Opciones::with('sub')->get();
    }


    public function getOpcionesSub($opt){
        $this->opcionSelect = Opciones::where('id', $opt)
                                        ->with('sub')->first();
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
            $this->openFormOptions =  false;

        }
        $this->reset(['nombre', 'option_id']);
    }

    public function cerrarModalImg(){ // vacio de momento

    }




}