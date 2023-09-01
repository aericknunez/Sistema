<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_ordens', function (Blueprint $table) {
            $table->id();
            $table->integer('clientes')->default(1);
            $table->integer('tipo_servicio')->default(1)->comment('1 Rapido, 2 Mesa, 3 Delivery');
            $table->string('empleado', 50);
            $table->integer('llevar_aqui')->default(0)->comment('0 Ninguno, 1 LLevar, 2 Comer Aqui');
            $table->string('nombre_mesa', 50)->nullable(true);
            $table->string('comentario', 200)->nullable(true);
            $table->integer('edo')->default(1)->comment('1 Activa, 2 Cobrada');

            $table->integer('usuario_borrado')->nullable(true);
            $table->string('motivo_borrado', 200)->nullable(true);
            $table->integer('imprimir')->nullable(true)->comment('0 Sin impresiones, 1 com impresiones');

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
        Schema::dropIfExists('ticket_ordens');
    }
}
