<?php

namespace Database\Seeders;

use App\Models\ConfigRoot;
use App\Common\Encrypt;
use Illuminate\Database\Seeder;

use App\Common\Helpers;
use Carbon\Carbon;

class ConfigRootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigRoot::create([
            'expira' => Encrypt::encrypt(Carbon::today()->addMonths()->toDateString(), config('sistema.td')),
            'expiracion' => Encrypt::encrypt(Helpers::fechaFormat(Carbon::today()->addMonths()->toDateString()), config('sistema.td')),
            'edo_sistema' => Encrypt::encrypt(1, config('sistema.td')),
            'tipo_sistema' => Encrypt::encrypt(3, config('sistema.td')),
            'plataforma' => Encrypt::encrypt(1, config('sistema.td')),
            'url_to_upload' => Encrypt::encrypt(env("FTP_URL"), config('sistema.td')),
            'ftp_server' => Encrypt::encrypt(env("FTP_SERVER"), config('sistema.td')),
            'ftp_user' => Encrypt::encrypt(env("FTP_USERNAME"), config('sistema.td')),
            'ftp_password' => Encrypt::encrypt(env("FTP_PASSWORD"), config('sistema.td')),
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
    }
}
