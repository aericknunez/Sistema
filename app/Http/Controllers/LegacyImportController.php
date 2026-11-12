<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ConfigPaneles;
use App\Models\ConfigPrincipal;
use App\Models\CuentasPorCobrar;
use App\Models\Opciones;
use App\Models\OpcionesProducto;
use App\Models\OpcionesSub;
use App\Models\OrderImg;
use App\Models\Producto;
use App\Models\ProductoCategoria;

/**
 * TEMPORAL (migracion a connect): devuelve los datos que importa el command legacy:import de connect.
 * Solo lee. Los filtros de negocio (opciones con menos de 2 variantes, categorias sin platillos, paneles
 * que coinciden) los aplica connect; aqui solo se filtran los registros activos.
 * Se borra al terminar la migracion (ver connect/docs/pending/plan-migracion-sistema.md).
 */
class LegacyImportController extends Controller
{
    public function menu()
    {
        $products = Producto::where('estado', 1)
            ->orderBy('id')
            ->get(['id', 'nombre', 'img', 'precio_costo', 'precio', 'panel', 'producto_categoria_id']);
        $productIds = $products->pluck('id');

        return response()->json([
            'categories' => ProductoCategoria::orderBy('id')->get(['id', 'nombre', 'img', 'principal']),
            'products' => $products,
            'options' => Opciones::orderBy('id')->get(['id', 'nombre']),
            'variants' => OpcionesSub::orderBy('id')->get(['id', 'opcion_id', 'nombre', 'img', 'precio']),
            'assignments' => OpcionesProducto::whereIn('producto_id', $productIds)
                ->orderBy('id')
                ->get(['id', 'producto_id', 'opcion_id']),
            // tipo_img: 1 producto, 2 categoria; imagen es el id. El menu se arma en el orden del id
            'order' => OrderImg::orderBy('id')->get(['id', 'tipo_img', 'imagen']),
        ]);
    }

    public function clients()
    {
        return response()->json([
            'clients' => Cliente::where('edo', 1)->orderBy('id')->get([
                'id', 'nombre', 'identidad', 'direccion', 'telefono', 'email', 'nacimiento', 'documento',
                'registro', 'cliente', 'giro', 'departamento_doc', 'direccion_doc', 'edo', 'comentarios',
            ]),
        ]);
    }

    public function panels()
    {
        return response()->json([
            'panels' => ConfigPaneles::orderBy('id')->get(['id', 'nombre', 'edo']),
        ]);
    }

    public function tables()
    {
        return response()->json([
            'no_mesas' => (int) optional(ConfigPrincipal::first())->no_mesas,
        ]);
    }

    public function credits()
    {
        // cuentas por cobrar activas (edo 1) con su cliente, solo para avisarle al restaurante
        $credits = CuentasPorCobrar::where('cuentas_por_cobrars.edo', 1)
            ->leftJoin('ticket_nums', 'ticket_nums.id', '=', 'cuentas_por_cobrars.factura_id')
            ->leftJoin('clientes', 'clientes.id', '=', 'ticket_nums.cliente_id')
            ->orderBy('cuentas_por_cobrars.id')
            ->get([
                'cuentas_por_cobrars.id',
                'ticket_nums.factura',
                'clientes.nombre as cliente',
                'cuentas_por_cobrars.cantidad',
                'cuentas_por_cobrars.saldo',
                'cuentas_por_cobrars.created_at',
            ]);

        return response()->json(['credits' => $credits]);
    }
}
