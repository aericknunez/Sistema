<?php

namespace App\Http\Livewire\Directorio;

use App\Common\Helpers;
use App\Models\Repartidor;
use Livewire\Component;
use Livewire\WithPagination;

class Repartidores extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $datos = [];

    protected $listeners = ['EliminarRepartidor' => 'destroy'];


    protected $rules = [
        'nombre' => 'required',
        'direccion' => 'required',
        'telefono' => 'required'
    ];

    public $nombre, 
            $telefono, 
            $direccion, 
            $email, 
            $documento, 
            $nacimiento, 
            $comentarios;

    public $repartidor_iden;




    public function render()
    {
        $repartidores = $this->getRepartidores();
        return view('livewire.directorio.repartidores', compact('repartidores'));
    }

    
    public function destroy($id)
    {
        $repartidor = Repartidor::find($id);
        $repartidor->delete();
        // $this->emit('deleted'); // otra forma de emitir el evento
        $this->dispatchBrowserEvent('mensaje', 
        ['clase' => 'success', 
        'titulo' => 'Realizado', 
        'texto' => 'Repartidor Eliminado correctamente']);
    }




    public function getRepartidores(){
        return  Repartidor::latest('id')
                    ->paginate(6);
    }


    public function selectRepartidor($reparti){
        $this->repartidor_iden = $reparti;
        $datos = Repartidor::where('id', $reparti)->first();

            $this->nombre = $datos->nombre;
            $this->telefono = $datos->telefono; 
            $this->direccion = $datos->direccion;
            $this->email = $datos->email; 
            $this->documento = $datos->documento; 
            $this->nacimiento = $datos->nacimiento; 
            $this->comentarios = $datos->comentarios;

    }



    public function cerrarModal(){
        $this->reset();
    }


    public function btnAddRepartidor(){
        $this->validate();     
        Repartidor::updateOrCreate(['id' => $this->repartidor_iden],
                    ['nombre' => $this->nombre,
                    'direccion' => $this->direccion,
                    'telefono' => $this->telefono,
                    'email' => $this->email,
                    'documento' => $this->documento,
                    'nacimiento' => $this->nacimiento,
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
