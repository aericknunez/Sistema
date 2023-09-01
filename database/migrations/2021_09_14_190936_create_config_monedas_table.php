<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigMonedasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_monedas', function (Blueprint $table) {
            $table->id();
            $table->string('moneda', 25);
            $table->string('activo', 25)->comment('0 no suma efectivo 1 suma efectivo');
            $table->integer('edo')->nullable(true);
            $table->double('extra', 10, 8)->nullable(true)->comment('cantidad extra que se aplica en esta opcion');
            $table->integer('tipo')->default(0)->nullable(true)->comment('1 porcentaje, 2 cantidad');
            $table->string('icono')->nullable(true)->comment('icono para mostrar');
            $table->string('clave', 25)->nullable(true);
            $table->string('tiempo', 25)->nullable(true);
            $table->integer('td')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_monedas');
    }
}
