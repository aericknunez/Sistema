<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSyncDeletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sync_deletes', function (Blueprint $table) {
            $table->id();
            $table->string('tabla', 50)->nullable(true);
            $table->integer('iden')->nullable(true);
            $table->string('tiempo', 25)->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sync_deletes');
    }
}
