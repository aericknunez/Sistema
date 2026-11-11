<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPollingIndexesToTicketTables extends Migration
{
    /**
     * Índices para las consultas del polling de mesas y de la pantalla de cocina,
     * que recorrían todo el historial de órdenes y productos.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_ordens', function (Blueprint $table) {
            $table->index(['edo', 'tipo_servicio', 'empleado'], 'idx_ticket_ordens_edo_servicio_empleado'); // mesas activas (MesasPropiedades)
            $table->index('imprimir', 'idx_ticket_ordens_imprimir'); // pantalla de cocina (Panel\Pantalla)
        });

        Schema::table('ticket_productos', function (Blueprint $table) {
            $table->index('orden', 'idx_ticket_productos_orden'); // productos de cada orden
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_ordens', function (Blueprint $table) {
            $table->dropIndex('idx_ticket_ordens_edo_servicio_empleado');
            $table->dropIndex('idx_ticket_ordens_imprimir');
        });

        Schema::table('ticket_productos', function (Blueprint $table) {
            $table->dropIndex('idx_ticket_productos_orden');
        });
    }
}
