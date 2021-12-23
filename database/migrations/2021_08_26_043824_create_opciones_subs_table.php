<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpcionesSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opciones_subs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('img', 100)->nullable(true);
            $table->double('precio', 10, 2)->nullable(true);

            $table->unsignedBigInteger('opcion_id');
            $table->foreign('opcion_id')
                    ->references('id')
                    ->on('opciones')
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
        Schema::dropIfExists('opciones_subs');
    }
}
