<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasPorCobrarAbonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_por_cobrar_abonos', function (Blueprint $table) {
            $table->id();

            
            $table->unsignedBigInteger('cuenta_id'); // cuenta banco
            $table->foreign('cuenta_id')
                    ->references('id')
                    ->on('cuentas_por_cobrars');

            $table->double('cantidad', 10, 4);

            $table->integer('tipo_pago')->nullable(true);

            $table->unsignedBigInteger('efectivo_cuenta_bancos_id')->nullable(true); // cuenta banco
            $table->foreign('efectivo_cuenta_bancos_id')
                    ->references('id')
                    ->on('efectivo_cuenta_bancos');

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
        Schema::dropIfExists('cuentas_por_cobrar_abonos');
    }
}
