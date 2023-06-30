<?php

use App\Models\TicketProducto;
use App\Models\TicketProductosSave;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTicketProductosSavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_productos_saves', function (Blueprint $table) {
            $table->id();
            $table->string('cod', 25);
            $table->integer('cantidad');
            $table->string('producto', 100);
            $table->double('pv', 10, 4);
            $table->double('stotal', 10, 4);
            $table->double('imp', 10, 4);
            $table->double('total', 10, 4);
            $table->double('descuento', 10, 4)->nullable(true);
            $table->integer('num_fact')->nullable(true);
            $table->integer('orden');
            $table->integer('cliente');
            $table->integer('cancela')->nullable(true);
            $table->integer('tipo_pago')->nullable(true)->comment('Efectivo, Tarjeta u otros');
            $table->string('usuario', 25);
            $table->string('cajero', 25)->nullable(true);
            $table->integer('tipo_venta')->nullable(true)->comment('Ticket, Factura u otros');
            $table->integer('gravado');
            $table->integer('edo');

            $table->integer('panel')->nullable(true);
            $table->integer('imprimir')->nullable(true)->comment('1 agregado || 2 Guardado a imprimir || 3 impreso || 4 Eliminado a imprimir');
            $table->integer('usuario_borrado')->nullable(true);
            $table->string('motivo_borrado', 200)->nullable(true);
            
            $table->string('clave', 25)->nullable(true);
            $table->string('tiempo', 25)->nullable(true);
            $table->integer('td')->nullable(true);
            
            $table->timestamps();
        });

        $productos = TicketProducto::whereNotNull('num_fact')->get();
        foreach ($productos as $producto) {
            if (TicketProductosSave::create([
                'cod'=> $producto->cod,
                'cantidad'=> $producto->cantidad,
                'producto'=> $producto->producto,
                'pv'=> $producto->pv,
                'stotal'=> $producto->stotal,
                'imp'=> $producto->imp,
                'total'=> $producto->total,
                'descuento'=> $producto->descuento,
                'num_fact'=> $producto->num_fact,
                'orden'=> $producto->orden,
                'cliente'=> $producto->cliente,
                'cancela'=> $producto->cancela,
                'tipo_pago'=> $producto->tipo_pago,
                'usuario'=> $producto->usuario,
                'cajero'=> $producto->cajero,
                'tipo_venta'=> $producto->tipo_venta,
                'gravado'=> $producto->gravado,
                'edo'=> $producto->edo,
                'panel'=> $producto->panel,
                'imprimir'=> $producto->imprimir,
                'usuario_borrado'=> $producto->usuario_borrado,
                'motivo_borrado'=> $producto->motivo_borrado,
                'clave'=> $producto->clave,
                'tiempo'=> $producto->tiempo,
                'td'=> $producto->td,
                'created_at'=> $producto->created_at,
                'updated_at'=>$producto->updated_at
            ])) {
                TicketProducto::where('id', $producto->id)->delete();
            }
        }

        Schema::dropIfExists('sync_tables');
        $sql = database_path('sync_tables.sql');
        DB::unprepared(file_get_contents($sql));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_productos_saves');
    }
}
