<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyncUpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sync_ups', function (Blueprint $table) {
            $table->id();
            $table->string('comprobacion', 100)->nullable(true);
            $table->string('inicio', 25)->nullable(true);
            $table->string('final', 25)->nullable(true);

            $table->integer('edo')->nullable(true)->comment('1 creada, 2 subida, 3 ejecutado');
            
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
        Schema::dropIfExists('sync_ups');
    }
}
