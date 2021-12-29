<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCampoToConfigPrincipal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config_principal', function (Blueprint $table) {
            $table->integer('solicitar_clave')->after('registro_borrar')->nullable(true)->comment('Activa solicitar clave de administrador para borrar comandas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('config_principal', function (Blueprint $table) {
            $table->dropColumn('solicitar_clave');  
        });
    }
}
