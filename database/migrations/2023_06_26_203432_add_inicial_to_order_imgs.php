<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInicialToOrderImgs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_imgs', function (Blueprint $table) {
            $table->string('inicial')->after('imagen')->nullable(true)->comment('Inicial de Nombre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_imgs', function (Blueprint $table) {
            $table->dropColumn('inicial');  
        });
    }
}
