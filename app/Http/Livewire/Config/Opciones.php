<?php

namespace App\Http\Livewire\Config;

use App\Models\Image;
use App\System\Config\ManejarIconos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Opciones extends Component
{

    use ManejarIconos;


    public function render()
    {
        return view('livewire.config.opciones');
    }

    public function recargarIconos(){

        Image::query()->delete();


        $sql = database_path('images.sql');
        if (DB::unprepared(file_get_contents($sql))) {
            $this->dispatchBrowserEvent('mensaje', 
            ['clase' => 'success', 
            'titulo' => 'Realizado', 
            'texto' => 'Iconos Actualizados correctamente']);
        } else {
            $this->dispatchBrowserEvent('error', 
            ['clase' => 'error', 
            'titulo' => 'Error', 
            'texto' => 'Error al actualiar los Iconos']);
        }

    }


    public function crearMenu(){
            $this->CrearIconos();
            $this->dispatchBrowserEvent('mensaje', 
            ['clase' => 'success', 
            'titulo' => 'Realizado', 
            'texto' => 'Iconos Actualizados correctamente']);
    }


}
