<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('cod', 50);
            $table->string('nombre', 100);
            $table->string('img', 100)->nullable(true);
            $table->string('tipo_icono', 100)->nullable(true);
            // $table->double('cant', 8, 2)->nullable(true);
            $table->double('precio_costo', 8, 2)->nullable(true);
            $table->double('precio', 8, 2)->nullable(true);
            $table->integer('gravado')->default(1)->nullable(true);
            $table->integer('especial')->nullable(true);
            $table->integer('panel')->nullable(true);
            $table->integer('opciones_active')->nullable(true);


            $table->unsignedBigInteger('producto_categoria_id');
            $table->foreign('producto_categoria_id')
                    ->references('id')
                    ->on('producto_categorias');

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
        Schema::dropIfExists('productos');
    }
}
