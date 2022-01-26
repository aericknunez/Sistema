<?php

namespace App\Http\Livewire\Directorio;

use App\Common\Helpers;
use App\Models\Proveedor;
use Livewire\Component;
use Livewire\WithPagination;

class Proveedores extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $datos = [];

    protected $listeners = ['EliminarProveedor' => 'destroy'];


    protected $rules = [
        'nombre' => 'required',
        'direccion' => 'required',
        'telefono' => 'required'
    ];

    public $nombre, 
            $identidad, 
            $telefono, 
            $direccion, 
            $email, 
            $contacto, 
            $telefono_contacto, 
            $documento, 
            $registro, 
            $cliente, 
            $giro, 
            $departamento_doc, 
            $direccion_doc, 
            $comentarios;

    public $proveedor_iden;


    public function render()
    {
        $proveedores = $this->getProveedores();
        return view('livewire.directorio.proveedores', compact('proveedores'));
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->delete();
        // $this->emit('deleted'); // otra forma de emitir el evento
        $this->dispatchBrowserEvent('mensaje', 
        ['clase' => 'success', 
        'titulo' => 'Realizado', 
        'texto' => 'Proveedor Eliminado correctamente']);
    }




    public function getProveedores(){
        return  Proveedor::latest('id')
                    ->paginate(6);
    }


    public function selectProveedor($provee){
        $this->proveedor_iden = $provee;
        $datos = Proveedor::where('id', $provee)->first();

            $this->nombre = $datos->nombre;
            $this->identidad = $datos->identidad; 
            $this->telefono = $datos->telefono; 
            $this->direccion = $datos->direccion;
            $this->email = $datos->email; 
            $this->contacto = $datos->contacto; 
            $this->telefono_contacto = $datos->telefono_contacto; 
            $this->documento = $datos->documento; 
            $this->registro = $datos->registro; 
            $this->cliente = $datos->cliente; 
            $this->giro = $datos->giro; 
            $this->departamento_doc = $datos->departamento_doc; 
            $this->direccion_doc = $datos->direccion_doc;
            $this->comentarios = $datos->comentarios;

    }


    public function cerrarModal(){
        $this->reset();
    }

    public function btnAddProveedor(){
        $this->validate();    
        Proveedor::updateOrCreate(['id' => $this->proveedor_iden],
                    ['nombre' => $this->nombre,
                    'direccion' => $this->direccion,
                    'telefono' => $this->telefono,
                    'email' => $this->email,
                    'contacto' => $this->contacto,
                    'telefono_contacto' => $this->telefono_contacto,
                    'documento' => $this->documento,
                    'registro' => $this->registro,
                    'cliente' => $this->cliente,
                    'giro' => $this->giro,
                    'departamento_doc' => $this->departamento_doc,
                    'direccion_doc' => $this->direccion_doc,
                    'edo' => 1,
                    'comentarios' => $this->comentarios,
                    'clave' => Helpers::hashId(),
                    'tiempo' => Helpers::timeId(),
                    'td' => config('sistema.td')
                ]);

        
        $this->reset();
        $this->emit('creado'); // manda el mensaje de creado

    }








}
