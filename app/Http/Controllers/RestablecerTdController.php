<?php

namespace App\Http\Controllers;

use App\Common\Encrypt;
use App\Common\Helpers;
use App\Models\ConfigPrivate;
use App\Models\ConfigRoot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Multitenancy\Models\Concerns\UsesTenantModel;

class RestablecerTdController extends Controller
{
    use UsesTenantModel;
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $td = null)
    {

        if (!$td) {
            $host = $request->getHost();
            $td = $this->getTenantModel()::whereDomain($host)->first()->td;
        }
        
        $conf = ConfigRoot::find(1);
        $tablas = DB::select('SHOW TABLES');
        foreach ($tablas as $tabla) {
            $nombreTabla = reset($tabla);
            if (Schema::hasColumn($nombreTabla, 'td')) {
                DB::table($nombreTabla)->update(['td' => $td]);
            }
        }
        ConfigRoot::find(1)->update([
            'expira' => Encrypt::encrypt(Carbon::today()->addMonths()->toDateString(), $td),
            'expiracion' => Encrypt::encrypt(Helpers::fechaFormat(Carbon::today()->addMonths()->toDateString()), $td),
            'edo_sistema' => Encrypt::encrypt(Encrypt::decrypt($conf->edo_sistema, $conf->td),$td),
            'tipo_sistema' => Encrypt::encrypt(Encrypt::decrypt($conf->tipo_sistema, $conf->td),$td),
            'plataforma' => Encrypt::encrypt(2 ,$td),
            'url_to_upload' => Encrypt::encrypt(Encrypt::decrypt($conf->url_to_upload, $conf->td),$td),
            'ftp_server' => Encrypt::encrypt(Encrypt::decrypt($conf->ftp_server, $conf->td),$td),
            'ftp_user' => Encrypt::encrypt(Encrypt::decrypt($conf->ftp_user, $conf->td),$td),
            'ftp_password' => Encrypt::encrypt(Encrypt::decrypt($conf->ftp_password, $conf->td),$td),
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => $td]);

            ConfigPrivate::find(1)->update(['pusher' => 1, 'livewire_path' => $request->root()]);

        return "¡El campo td ha sido actualizado con el valor de ". $td ." en todas las tablas!";
    }
}
