<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNumeroLineasFaturaToPrincipal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config_principal', function (Blueprint $table) {
            $table->integer('lineas_factura')->after('restringir_inventario')->nullable(true)->comment('Numero de lineas factura');
            $table->integer('lineas_ccf')->after('lineas_factura')->nullable(true)->comment('Numero de lineas credito fiscal');
            $table->integer('ordenar_menu')->after('lineas_ccf')->nullable(true)->comment('Ordenar alfabeticamente');
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
            $table->dropColumn('lineas_factura');  
            $table->dropColumn('lineas_ccf');  
            $table->dropColumn('ordenar_menu');  
        });
    }
}
