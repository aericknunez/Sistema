<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyncLastUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sync_last_updates', function (Blueprint $table) {
            $table->id();
            $table->timestamp('last_update')->nullable();
            $table->string('ip')->nullable();
            $table->string('navegador')->nullable();
            $table->string('identificador')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sync_last_updates');
    }
}
