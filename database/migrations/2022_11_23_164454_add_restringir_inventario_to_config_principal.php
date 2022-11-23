<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRestringirInventarioToConfigPrincipal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config_principal', function (Blueprint $table) {
            $table->integer('restringir_inventario')
            ->after('agrupar_orden')
            ->nullable(true)
            ->comment('Restinge a los ususarioa a vender productos si no hay existencias en inventario');
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
            $table->dropColumn('restringir_inventario');  
        });
    }
}
