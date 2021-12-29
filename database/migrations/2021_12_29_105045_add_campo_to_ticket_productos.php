<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCampoToTicketProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_productos', function (Blueprint $table) {
            $table->integer('usuario_borrado')->after('imprimir')->nullable(true);
            $table->string('motivo_borrado', 200)->after('usuario_borrado')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_productos', function (Blueprint $table) {
            $table->dropColumn('usuario_borrado');  
            $table->dropColumn('motivo_borrado');  
            
        });
    }
}
