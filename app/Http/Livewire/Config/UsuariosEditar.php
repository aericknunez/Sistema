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
        if (session('config_tipo_usuario') == 1) {
            return  User::whereNotIn('id',[1, 2])->latest('id')->paginate(6);
        } else {
            return  User::whereNotIn('id',[1, 2])
                        ->where('tipo_usuario', '!=', '7')
                        ->OrWhere('tipo_usuario', NULL)
                        ->latest('id')->paginate(6);
        }
    }

    public function selectUser($user){
        $this->userId = $user;
    }

    public function changeUser($tipo){
        User::where('id', $this->userId)->update(['tipo_usuario' => $tipo]);
        $user = User::where('id', $this->userId)->first(); // obtiene los datos del usuario
        $user->roles()->sync($tipo); // sincroniza con el tipo de usuario

        $this->reset();
        $this->emit('creado'); // manda el mensaje de creado
    }



}
