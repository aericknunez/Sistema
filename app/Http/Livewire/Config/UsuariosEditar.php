<?php

namespace App\Http\Livewire\Config;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class UsuariosEditar extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['delete' => 'delete'];


    public $userId;

    public $nombre, $email, $password, $password_confirmation, $tipo_user = 6;


    public function render()
    {
        $usuarios = $this->getUsuarios();
        return view('livewire.config.usuarios-editar', compact('usuarios'));
    }


    public function getUsuarios(){
        if (session('config_tipo_usuario') == 1) {
            return  User::whereNotIn('id',[1, 2])->where('tipo_usuario', '!=', '99')->latest('id')->paginate(6);
        } else {
            return  User::whereNotIn('id',[1, 2])
                        ->where('tipo_usuario', '!=', '7')
                        ->where('tipo_usuario', '!=', '99')
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


    public function delete(User $iden){
        $iden->update(['tipo_usuario' => 99]);

        $this->emit('desabilitada'); // manda el mensaje de creado
    }


    // agregar Usuario
    public function addUser(){
        $this->validate([   'nombre' => 'min:10|required',
                            'email' => 'min:10|required|unique:users,email|email',
                            'password' => 'min:6|required|required_with:password_confirmation|same:password_confirmation',
                            'password_confirmation' => 'min:6|required',
                            'tipo_user' => 'required'
    ]);

    $user = User::create([
        'name' => $this->nombre,
        'email' => $this->email,
        'password' => Hash::make($this->password),
        'email_verified_at' =>  now(),
        'tipo_usuario' => $this->tipo_user,
    ]);
    $user->roles()->sync($this->tipo_user); // sincroniza con el tipo de usuario
    $this->emit('creado'); // manda el mensaje de creado
    $this->reset();

}


}
