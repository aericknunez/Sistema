<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_productos', function (Blueprint $table) {
            $table->id();
            $table->string('cod', 25);
            $table->integer('cantidad');
            $table->string('producto', 100);
            $table->double('pv', 10, 4);
            $table->double('stotal', 10, 4);
            $table->double('imp', 10, 4);
            $table->double('total', 10, 4);
            $table->double('descuento', 10, 4)->nullable(true);
            $table->integer('num_fact')->nullable(true);
            $table->integer('orden');
            $table->integer('cliente');
            $table->integer('cancela')->nullable(true);
            $table->integer('tipo_pago')->nullable(true)->comment('Efectivo, Tarjeta u otros');
            $table->string('usuario', 25);
            $table->string('cajero', 25)->nullable(true);
            $table->integer('tipo_venta')->nullable(true)->comment('Ticket, Factura u otros');
            $table->integer('gravado');
            $table->integer('edo');

            $table->integer('panel')->nullable(true);
            $table->integer('imprimir')->nullable(true)->comment('1 agregado || 2 Guardado a imprimir || 3 impreso || 4 Eliminado a imprimir');

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
        Schema::dropIfExists('ticket_productos');
    }
}
