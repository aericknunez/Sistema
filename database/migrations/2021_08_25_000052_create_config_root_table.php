<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigRootTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_root', function (Blueprint $table) {
            $table->id();
            $table->string('expira', 100)->nullable(true);
            $table->string('expiracion', 100)->nullable(true);
            $table->string('edo_sistema', 100)->nullable(true)->comment('1 Activo || 0 Inactivo');
            $table->string('tipo_sistema', 100)->nullable(true)->comment('1 Basico || 2 Profesioanl || 3 Empresa');
            $table->string('plataforma', 100)->nullable(true)->comment('1 Local || 2 Web');
            $table->string('ftp_server', 100)->nullable(true);
            $table->string('ftp_user', 100)->nullable(true);
            $table->string('ftp_password', 100)->nullable(true);
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
        Schema::dropIfExists('config_root');
    }
}
