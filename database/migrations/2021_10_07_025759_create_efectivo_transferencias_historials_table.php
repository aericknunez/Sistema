<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEfectivoTransferenciasHistorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('efectivo_transferencias_historials', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('origen_id')->nullable(true); // cuenta banco
            $table->foreign('origen_id')
                    ->references('id')
                    ->on('efectivo_cuenta_bancos');

            $table->unsignedBigInteger('destino_id')->nullable(true); // cuenta banco
            $table->foreign('destino_id')
                    ->references('id')
                    ->on('efectivo_cuenta_bancos');

            $table->double('cantidad', 10, 4);
            $table->double('saldo_origen_anterior', 10, 4)->nullable(true);
            $table->double('saldo_destino_anterior', 10, 4);
            $table->double('saldo_origen', 10, 4)->nullable(true);
            $table->double('saldo_destino', 10, 4);
            $table->string('transferencia', 200)->nullable(true);
            $table->string('fechaT', 25)->nullable(true);

            $table->string('cajero', 25)->nullable(true);
            $table->integer('edo')->nullable(true);

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
        Schema::dropIfExists('efectivo_transferencias_historials');
    }
}
