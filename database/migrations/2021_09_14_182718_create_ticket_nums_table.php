<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketNumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_nums', function (Blueprint $table) {
            $table->id();
            $table->integer('factura');
            $table->integer('orden');
            $table->integer('tipo_pago')->comment('Efectivo u otros');
            $table->double('efectivo', 10, 4);
            $table->double('subtotal', 10, 4);
            $table->double('total', 10, 4);
            $table->double('propina_cant', 10, 4)->nullable(true);
            $table->double('propina_porcent', 10, 4)->nullable(true);
            $table->string('cajero', 25);
            $table->integer('tipo_venta')->nullable(true)->comment('Ticket, Factura u otros');
            $table->unsignedBigInteger('cliente_id')->nullable(true)->comment('Cliente al que se le facturo');
            
            $table->foreign('cliente_id')
                    ->references('id')
                    ->on('clientes');

            $table->integer('edo');


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
        Schema::dropIfExists('ticket_nums');
    }
}
