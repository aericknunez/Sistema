<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasPorCobrarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_por_cobrars', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('factura_id');
            $table->foreign('factura_id')
                    ->references('id')
                    ->on('ticket_nums');

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
        Schema::dropIfExists('cuentas_por_cobrars');
    }
}
