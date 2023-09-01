<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigPrivatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_privates', function (Blueprint $table) {
            $table->id();

            $table->integer('sys_login')->nullable(true)->default(1)->comment('Inicia con iconos del sistema');
            $table->integer('just_data')->nullable(true)->default(0)->comment('Solo muestra datos en la web de respaldo');
            $table->integer('data_special')->nullable(true)->default(0)->comment('Datos para negocio de pollo');
            $table->integer('sync_time')->nullable(true)->default(5)->comment('Tiempo para la sincronizacion');
            $table->integer('pusher')->nullable(true)->default(0)->comment('Activar Pusher Comandas');
            $table->integer('print')->nullable(true)->default(0)->comment('Descativa la impresion de tickets');
            $table->string('livewire_path', 100)->nullable(true)->default('http://sistema.test')->comment('Direccion para los archivos de livewire');

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
        Schema::dropIfExists('config_privates');
    }
}
