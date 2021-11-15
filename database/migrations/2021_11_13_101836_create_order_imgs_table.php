<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_imgs', function (Blueprint $table) {
            $table->id();
            
            $table->integer('tipo_img');
            $table->integer('imagen');
            
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
        Schema::dropIfExists('order_imgs');
    }
}
