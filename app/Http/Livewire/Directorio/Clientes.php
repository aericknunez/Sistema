<?php

namespace App\Http\Livewire\Directorio;

use App\Common\Helpers;
use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class Clientes extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['EliminarCliente' => 'destroy'];

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
            $nacimiento, 
            $documento, 
            $registro, 
            $cliente, 
            $giro, 
            $departamento_doc, 
            $direccion_doc, 
            $comentarios,
            $search;

    public $client_iden;


    public function mount(){
        $this->telefono = 0;
        $this->direccion = "Ninguno";
        $this->search = NULL;
    }



    public function render()
    {
        if ($this->search) {
            $clientes = cliente::where('nombre', 'LIKE', '%'.$this->search.'%')
                    ->orwhere('telefono', 'LIKE', '%'.$this->search.'%')
                    ->orderBy('id', 'DESC')
                    ->paginate(10);
        } else {
            $clientes = $this->getClientes();
                }
        return view('livewire.directorio.clientes', compact('clientes'));
    }



    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        // $this->emit('deleted'); // otra forma de emitir el evento
        $this->dispatchBrowserEvent('mensaje', 
        ['clase' => 'success', 
        'titulo' => 'Realizado', 
        'texto' => 'Cliente Eliminado correctamente']);
    }




    public function getClientes(){
        return  Cliente::latest('id')->paginate(6);
    }


    public function cerrarModal(){
        $this->reset();
    }


    public function selectClient($cliente){
        $this->client_iden = $cliente;
        $datos = Cliente::where('id', $cliente)->first();

            $this->nombre = $datos->nombre;
            $this->identidad = $datos->identidad; 
            $this->telefono = $datos->telefono; 
            $this->direccion = $datos->direccion;
            $this->email = $datos->email; 
            $this->nacimiento = $datos->nacimiento; 
            $this->documento = $datos->documento; 
            $this->registro = $datos->registro; 
            $this->cliente = $datos->cliente; 
            $this->giro = $datos->giro; 
            $this->departamento_doc = $datos->departamento_doc; 
            $this->direccion_doc = $datos->direccion_doc;
            $this->comentarios = $datos->comentarios;
    }


    public function btnAddCliente(){
        $this->validate();
        Cliente::updateOrCreate(['id' => $this->client_iden],
                    ['nombre' => $this->nombre,
                    'identidad' => $this->identidad,
                    'direccion' => $this->direccion,
                    'telefono' => $this->telefono,
                    'email' => $this->email,
                    'nacimiento' => $this->nacimiento,
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
                    'td' => session('sistema.td')
                ]);

        
        $this->reset();
        $this->emit('creado'); // manda el mensaje de creado

    }

    public function cancelar(){
        $this->reset(['search']);
    }


}
