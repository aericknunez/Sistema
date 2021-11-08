<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_deliveries', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('orden_id')->nullable(true)->comment('Orden a la que se hace referencia en delivery');
            $table->foreign('orden_id')
                    ->references('id')
                    ->on('ticket_ordens')
                    ->onDelete('cascade');

            $table->integer('cliente_id')->nullable(true);
            $table->integer('repartidor_id')->nullable(true);


            $table->time('ingreso')->nullable(true);
            $table->time('enviado')->nullable(true);
            $table->time('entregado')->nullable(true);
            $table->time('pagado')->nullable(true);

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
        Schema::dropIfExists('ticket_deliveries');
    }
}
