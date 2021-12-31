<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrdenestodoToConfigPrincipal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config_principal', function (Blueprint $table) {
            $table->integer('ordenes_todo')->after('solicitar_clave')->nullable(true)->comment('Activa que todos los meseros pueden ver las ordenes de todos');
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
            $table->dropColumn('ordenes_todo');  
        });
    }
}
