<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFearuresToConfigPrincipal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('config_principal', function (Blueprint $table) {
            $table->integer('llevar_aqui_propina_cambia')->after('llevar_delivery')->nullable(true)->comment('valor establece si la propina se quita al establecer como llevar');

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
            $table->dropColumn('llevar_aqui_propina_cambia');
        });
    }
}
