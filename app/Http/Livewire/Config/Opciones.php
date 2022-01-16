<?php

namespace App\Http\Livewire\Config;

use App\Common\Helpers;
use App\Models\Image;
use App\Models\ImageCategory;
use App\Models\ImageTag;
use App\Models\Opciones as ModelsOpciones;
use App\Models\OpcionesProducto;
use App\Models\OpcionesSub;
use App\Models\OrderImg;
use App\Models\Producto;
use App\Models\ProductoCategoria;
use App\Models\SyncTable;
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

            Image::where('td', 0)->orWhere('td', NULL)->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
            ImageCategory::where('td', 0)->orWhere('td', NULL)->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
            ImageTag::where('td', 0)->orWhere('td', NULL)->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
            
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



    public function recargarTablas(){

        SyncTable::query()->delete();


        $sql = database_path('sync_tables.sql');
        if (DB::unprepared(file_get_contents($sql))) {
            $this->dispatchBrowserEvent('mensaje', 
            ['clase' => 'success', 
            'titulo' => 'Realizado', 
            'texto' => 'Las tablas se actualizaron correctamente']);
        } else {
            $this->dispatchBrowserEvent('error', 
            ['clase' => 'error', 
            'titulo' => 'Error', 
            'texto' => 'Error al actualiar Tablas de actualiación']);
        }

    }


    public function cambioDatabase(){
        // $tablas = SyncTable::all();
        $counter = 0;

        // foreach ($tablas as $table) {
        //     if ($table) {
        //         if (DB::table($table)
        //         ->where('td', 0)
        //         ->update(['td' => session('sistema.td')])) {
        //            $counter ++;
        //         }
        //     }

        // }

        Image::where('td', '!=', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
        ImageCategory::where('td', '!=', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
        ImageTag::where('td', '!=', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
        OrderImg::where('td', '!=', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
        Producto::where('td', '!=', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
        ProductoCategoria::where('td', '!=', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);

        ModelsOpciones::where('td', '!=', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
        OpcionesSub::where('td', '!=', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
        OpcionesProducto::where('td', '!=', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);


        $this->dispatchBrowserEvent('mensaje', 
        ['clase' => 'success', 
        'titulo' => 'Realizado', 
        'texto' => 'Datos Actualizados correctamente']);
    }


}
