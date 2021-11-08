<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEfectivoCuentaBancosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('efectivo_cuenta_bancos', function (Blueprint $table) {
            $table->id();

            $table->integer('tipo')->nullable(true);
            $table->string('cuenta', 100)->nullable(true);
            $table->string('banco', 200)->nullable(true);
            $table->double('saldo', 8, 4);
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
        Schema::dropIfExists('efectivo_cuenta_bancos');
    }
}
