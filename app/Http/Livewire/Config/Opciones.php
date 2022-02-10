<?php

namespace App\Http\Livewire\Config;

use App\Common\Helpers;
use App\Models\Image;
use App\Models\ImageCategory;
use App\Models\ImageTag;
use App\Models\InvUnidades;
use App\Models\Opciones as ModelsOpciones;
use App\Models\OpcionesProducto;
use App\Models\OpcionesSub;
use App\Models\OrderImg;
use App\Models\Producto;
use App\Models\ProductoCategoria;
use App\Models\SyncTable;
use App\Models\User;
use App\System\Config\ManejarIconos;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Opciones extends Component
{

    use ManejarIconos;

    public $sysUpdate;






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

            Image::where('td', '<>', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
            ImageCategory::where('td', '<>', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
            ImageTag::where('td', '<>', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
            OrderImg::where('td', '<>', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
            
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

        $sql = database_path('permisos.sql');
        if (DB::unprepared(file_get_contents($sql))) {

        $usuarios = User::select('id', 'tipo_usuario')->where('tipo_usuario', '!=', NULL)->get();
        if (count($usuarios)) {
            DB::select('SET FOREIGN_KEY_CHECKS=0');
            DB::select('DELETE FROM model_has_roles');
            foreach ($usuarios as $usuario) {
                $usuario->assignRole($usuario->tipo_usuario);
            }
        }

        
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

            $this->dispatchBrowserEvent('mensaje', 
            ['clase' => 'success', 
            'titulo' => 'Realizado', 
            'texto' => 'Permisos de Usuario Actualizados']);
        }

        $sql = database_path('inv_unidades.sql');
        DB::unprepared(file_get_contents($sql));
        
        Image::where('td', '<>', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
        ImageCategory::where('td', '<>', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
        ImageTag::where('td', '<>', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
        OrderImg::where('td', '<>', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
        Producto::where('td', '<>', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
        ProductoCategoria::where('td', '<>', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);

        ModelsOpciones::where('td', '<>', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
        OpcionesSub::where('td', '<>', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
        OpcionesProducto::where('td', '<>', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);
        InvUnidades::where('td', '<>', config('sistema.td'))->update(['td' => config('sistema.td'), 'tiempo' => Helpers::timeId()]);


        $this->dispatchBrowserEvent('mensaje', 
        ['clase' => 'success', 
        'titulo' => 'Realizado', 
        'texto' => 'Datos Actualizados correctamente...']);
    }




    public function actualizarSistema(){

        $sql = database_path('permisos.sql');
        if (DB::unprepared(file_get_contents($sql))) {

        $usuarios = User::select('id', 'tipo_usuario')->where('tipo_usuario', '!=', NULL)->get();
        if (count($usuarios)) {
            DB::select('SET FOREIGN_KEY_CHECKS=0');
            DB::select('DELETE FROM model_has_roles');
            foreach ($usuarios as $usuario) {
                $usuario->assignRole($usuario->tipo_usuario);
            }
        }

        
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

            $this->dispatchBrowserEvent('mensaje', 
            ['clase' => 'success', 
            'titulo' => 'Realizado', 
            'texto' => 'Permisos de Usuario Actualizados']);
        }

        if (exec('c:\windows\system32\cmd.exe /c C:\laragon\bin\cmder\descargar.bat')) {
            if (exec('c:\windows\system32\cmd.exe /c C:\laragon\bin\cmder\execute\4456447897.bat')) {
                $this->dispatchBrowserEvent('mensaje', 
                ['clase' => 'success', 
                'titulo' => 'Realizado', 
                'texto' => 'Artisan Ejecutado']);
            }
            Artisan::call('migrate');
            Artisan::call('route:clear');

            $sql = database_path('inv_unidades.sql');
            DB::unprepared(file_get_contents($sql));            

            $this->dispatchBrowserEvent('mensaje', 
            ['clase' => 'success', 
            'titulo' => 'Realizado', 
            'texto' => 'Sistema Actualizado correctamente']);
        } else {
            $this->dispatchBrowserEvent('error', 
            ['clase' => 'error', 
            'titulo' => 'Error', 
            'texto' => 'Ocurrio un error en la actualizacion']);          
        }

    }


}
