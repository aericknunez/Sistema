<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketOpcionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_opcions', function (Blueprint $table) {
            $table->id();
            $table->integer('opcion_primaria')->comment('Opcion Primiaria, id del nombre de la opcion');

            $table->unsignedBigInteger('opcion_producto_id')->nullable(true)->comment('Id de la sub opcion elegida');
            $table->foreign('opcion_producto_id')
                    ->references('id')
                    ->on('opciones_subs')
                    ->onDelete('cascade');


            $table->unsignedBigInteger('ticket_producto_id');
            $table->foreign('ticket_producto_id')
                    ->references('id')
                    ->on('ticket_productos')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('ticket_opcions');
    }
}
