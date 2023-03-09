<?php

namespace Database\Seeders;

use App\Models\ConfigRoot;
use App\Common\Encrypt;
use Illuminate\Database\Seeder;

use App\Common\Helpers;

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
            'expira' => Encrypt::encrypt('31-12-2023', config('sistema.td')),
            'expiracion' => Encrypt::encrypt(strtotime('31-12-2023'), config('sistema.td')),
            'edo_sistema' => Encrypt::encrypt(1, config('sistema.td')),
            'tipo_sistema' => Encrypt::encrypt(3, config('sistema.td')),
            'plataforma' => Encrypt::encrypt(1, config('sistema.td')),
            'url_to_upload' => Encrypt::encrypt("https://updata.hibridosv.com", config('sistema.td')),
            'ftp_server' => Encrypt::encrypt("access862695802.webspace-data.io", config('sistema.td')),
            'ftp_user' => Encrypt::encrypt("u103976998-dataup", config('sistema.td')),
            'ftp_password' => Encrypt::encrypt("Hibrido*1-", config('sistema.td')),
            'clave' => Helpers::hashId(),
            'tiempo' => Helpers::timeId(),
            'td' => config('sistema.td')
        ]);
    }
}
