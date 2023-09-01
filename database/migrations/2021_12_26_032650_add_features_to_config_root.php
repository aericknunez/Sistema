<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeaturesToConfigRoot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('config_root', function(Blueprint $table){

            $table->string('url_to_upload', 200)->after('plataforma')->nullable(true);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('config_root', function (Blueprint $table) {
            $table->dropColumn('url_to_upload');
        });
    }
}
