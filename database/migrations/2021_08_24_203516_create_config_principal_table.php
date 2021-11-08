<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigPrincipalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_principal', function (Blueprint $table) {
            $table->id();
            $table->integer('no_mesas')->nullable(true);
            $table->integer('no_cajas')->nullable(true);
            $table->integer('ticket_pantalla')->nullable(true)->comment('0 ninguno || 1 pantalla || 2 Ticket');
            $table->integer('registro_borrar')->nullable(true)->comment('Establece si se pueden  borrar o no los productos ya guardados');
            $table->integer('comentarios_comanda')->nullable(true);
            $table->integer('llevar_aqui')->nullable(true)->comment('Establece boton de la opcion para llevar o comer aqui');

            $table->integer('propina_rapida')->nullable(true)->comment('esteblecer propina rapida');
            $table->integer('propina_mesa')->nullable(true)->comment('esteblecer propina mesa');
            $table->integer('propina_delivery')->nullable(true)->comment('esteblecer propina delivery');

            $table->integer('llevar_mesa')->nullable(true)->default(2)->comment('valor establecido para llevar en mesa');
            $table->integer('llevar_rapida')->nullable(true)->default(1)->comment('valor establecido para llevar en venta rapida');
            $table->integer('llevar_delivery')->nullable(true)->default(1)->comment('valor establecido para llevar en venta delivery');


            $table->integer('sonido')->nullable(true);
            $table->integer('tipo_menu')->nullable(true);
            $table->integer('otras_ventas')->nullable(true);
            $table->integer('venta_especial')->nullable(true);
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
        Schema::dropIfExists('config_principal');
    }
}
