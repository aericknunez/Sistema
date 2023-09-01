<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEfectivoGastosImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('efectivo_gastos_images', function (Blueprint $table) {
            $table->id();

            $table->integer('gasto')->nullable(true);
            $table->string('imagen', 100)->nullable(true);
            $table->string('descripcion', 200)->nullable(true);
            $table->string('fechaT', 25)->nullable(true);

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
        Schema::dropIfExists('efectivo_gastos_images');
    }
}
