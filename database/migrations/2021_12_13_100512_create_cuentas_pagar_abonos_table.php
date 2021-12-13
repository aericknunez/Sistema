<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasPagarAbonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_pagar_abonos', function (Blueprint $table) {
            $table->id();

            
            $table->unsignedBigInteger('cuenta_id'); // cuenta banco
            $table->foreign('cuenta_id')
                    ->references('id')
                    ->on('cuentas_pagars');

            $table->double('cantidad', 8, 4);

            $table->timestamp('fecha_del', $precision = 0)->nullable(true);

            $table->integer('user');
            $table->integer('user_del');

            $table->integer('edo')->comment('1 Activo, 2 Pagado, 0 Eliminado');

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
        Schema::dropIfExists('cuentas_pagar_abonos');
    }
}