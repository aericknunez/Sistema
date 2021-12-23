<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigAppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_app', function (Blueprint $table) {
            $table->id();
            $table->string('sistema', 50)->nullable(true);
            $table->string('cliente', 100)->nullable(true);
            $table->string('slogan', 30)->nullable(true);
            $table->string('direccion', 50)->nullable(true);
            $table->string('telefono', 25)->nullable(true);
            $table->string('email', 50)->nullable(true);
            $table->string('propietario')->nullable(true);
            $table->string('giro', 100)->nullable(true);
            $table->string('nit', 50)->nullable(true);
            $table->double('imp', 10, 2)->nullable(true);
            $table->double('propina', 10, 2)->nullable(true);
            $table->double('envio', 10, 2)->nullable(true)->default(0); // precio del envio
            $table->integer('multiple_pago')->nullable(true)->default(0);     
            $table->integer('pais')->nullable(true)->default(1);     
            $table->string('skin', 25)->nullable(true);
            $table->string('logo', 25)->nullable(true);
            $table->integer('tipo_servicio')->comment('Si inicia en mesas, rapido o delivery 1 rapido 2mesa 3delivery')->nullable(true);
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
        Schema::dropIfExists('config_app');
    }
}
