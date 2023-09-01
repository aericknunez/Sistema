<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasPagarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_pagars', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('proveedor_id'); // cuenta banco
            $table->foreign('proveedor_id')
                    ->references('id')
                    ->on('proveedors');

            $table->string('nombre', 200);
            $table->string('detalles', 250)->nullable(true);

            $table->string('factura', 100)->nullable(true);
            $table->string('comprobante', 25)->nullable(true);;

            $table->double('cantidad', 10, 4);
            $table->double('abonos', 10, 4);
            $table->double('saldo', 10, 4);

            $table->timestamp('caducidad', $precision = 0)->nullable(true);

            $table->integer('edo')->comment('1 Activo, 2 Pagado, 0 Eliminado');;

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
        Schema::dropIfExists('cuentas_pagars');
    }
}
