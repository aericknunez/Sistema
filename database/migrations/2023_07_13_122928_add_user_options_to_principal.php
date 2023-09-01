<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserOptionsToPrincipal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config_principal', function (Blueprint $table) {
            $table->integer('ver_mesas')->after('ordenar_menu')->nullable(true)->comment('Muestra a mesero opcion de mesas');
            $table->integer('ver_delivery')->after('ver_mesas')->nullable(true)->comment('Muestra a mesero opcion de delivery');
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
            $table->dropColumn('ver_mesas');  
            $table->dropColumn('ver_delivery');  
        });
    }
}
