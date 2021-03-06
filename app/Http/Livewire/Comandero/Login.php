<?php

namespace App\Http\Livewire\Comandero;

use App\Models\User;
use Livewire\Component;

class Login extends Component
{

    public $users = [];
    public $usuario;
    public $password;

    public function mount(){
        $this->usuarios();
    }


    public function render()
    {
        return view('livewire.comandero.login');
    }



    
    public function usuarios(){
        $this->users = User::where('tipo_usuario', 5)->get();
    }

    public function modal($iden){
        $this->usuario = User::find($iden);
        $this->emit('modal'); // manda el mensaje de creado
    }

    public function cerrarModal(){
        $this->reset(['usuario']);
        $this->emit('cerrarmodal'); // manda el mensaje de creado
    }




}
