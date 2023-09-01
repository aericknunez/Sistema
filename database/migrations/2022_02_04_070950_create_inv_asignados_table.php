<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvAsignadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inv_asignados', function (Blueprint $table) {
            $table->id();

            $table->string('dependiente');
            $table->string('producto');

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
        Schema::dropIfExists('inv_asignados');
    }
}
