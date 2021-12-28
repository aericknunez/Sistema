<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeaturesToCorteDeCajas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('corte_de_cajas', function (Blueprint $table) {
            $table->double('efectivo_ingresado', 10, 4)->after('abonos')->nullable(true)->comment('Este es el efectivo que se ingresa externamente a caja en efectivo');
            $table->double('efectivo_retirado', 10, 4)->after('efectivo_ingresado')->nullable(true)->comment('Retiro dinero de caja en efectivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('corte_de_cajas', function (Blueprint $table) {
            $table->dropColumn('efectivo_ingresado');  
            $table->dropColumn('efectivo_retirado');  
        });
    }
}
