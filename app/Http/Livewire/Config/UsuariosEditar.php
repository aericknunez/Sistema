<?php

namespace App\Http\Livewire\Config;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsuariosEditar extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $userId;


    public function render()
    {
        $usuarios = $this->getUsuarios();
        return view('livewire.config.usuarios-editar', compact('usuarios'));
    }


    public function getUsuarios(){
        return  User::whereNotIn('id',[1, 2])->latest('id')
                    ->paginate(6);
    }

    public function selectUser($user){
        $this->userId = $user;
    }

    public function changeUser($tipo){
        User::where('id', $this->userId)->update(['tipo_usuario' => $tipo]);

        $this->reset();
        $this->emit('creado'); // manda el mensaje de creado
    }



}
