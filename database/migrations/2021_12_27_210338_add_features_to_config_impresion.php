<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeaturesToConfigImpresion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config_impresion', function (Blueprint $table) {
            $table->integer('comanda_agrupada')->after('seleccionado')->nullable(true)->comment('Al estar activa los datos de la comanda viajaran agrupados para la impresion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('config_impresion', function (Blueprint $table) {
            $table->dropColumn('comanda_agrupada');  
        });
    }
}
