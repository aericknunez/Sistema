<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigImpresionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_impresion', function (Blueprint $table) {
            $table->id();
            $table->integer('ninguno')->nullable(true)->default(1);
            $table->integer('ticket')->nullable(true)->default(0);
            $table->integer('factura')->nullable(true)->default(0);
            $table->integer('credito_fiscal')->nullable(true)->default(0);
            $table->integer('no_sujeto')->nullable(true)->default(0);
            $table->integer('imprimir_antes')->nullable(true)->default(0);
            $table->integer('comanda')->nullable(true)->default(0);
            $table->integer('opcional')->nullable(true)->default(0);
            $table->integer('seleccionado')->nullable(true)->default(0);
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
        Schema::dropIfExists('config_impresion');
    }
}
