<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Root']);
        $role2 = Role::create(['name' => 'Gerente']);
        $role3 = Role::create(['name' => 'Administrador']);
        $role4 = Role::create(['name' => 'Cajero']);
        $role5 = Role::create(['name' => 'Mesero']);
        $role6 = Role::create(['name' => 'Invitado']);
        $role7 = Role::create(['name' => 'Pantalla']);

        Permission::create(['name' => 'caja.aperturar', 'description' => 'Aperturar Caja'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'caja.select', 'description' => 'Seleccionar Caja'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'caja.selected', 'description' => 'Caja Seleccionada'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'caja.ordenes', 'description' => 'Ver Ordenes'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'venta.rapida', 'description' => 'Venta Rapida'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'venta.mesas', 'description' => 'Venta en Mesas'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'venta.delivery', 'description' => 'Venta Delivery'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'venta.cambios', 'description' => 'Cambios Orden'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'categoria.index', 'description' => 'Ver Categorias'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'opcion.index', 'description' => 'Ver Opciones'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'producto.index', 'description' => 'Ver Productos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'producto.create', 'description' => 'Ver Productos'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'corte.index', 'description' => 'Realizar Corte'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'efectivo.cuentas', 'description' => 'Cuentas Bancarias'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'efectivo.categorias', 'description' => 'Categoria Gastos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'efectivo.remesas', 'description' => 'Remesas'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'efectivo.gastos', 'description' => 'Gastos'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'efectivo.ingreso', 'description' => 'Ingresar Efectivo'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'efectivo.transacciones', 'description' => 'Lista de Transacciones'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'historial.reporte', 'description' => 'Reporte Diario'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'historial.ventas', 'description' => 'Historial de Ventas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'historial.gastos', 'description' => 'Historial Gastos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'historial.cortes', 'description' => 'Historial Cortes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'historial.meseros', 'description' => 'Venta Meseros'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'historial.ordenes', 'description' => 'Historial Ordenes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'historial.eliminadas', 'description' => 'Ordenes Eliminadas'])->syncRoles([$role1, $role2]);


        Permission::create(['name' => 'panel.control', 'description' => 'Panel de Control'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'panel.ordenes', 'description' => 'Ordenes Diarias'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'directorio.clientes', 'description' => 'Lista de Clientes'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'directorio.proveedores', 'description' => 'Lista Proveedores'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'directorio.repartidores', 'description' => 'Lista Repartidores'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'config.usuarios', 'description' => 'Editar Usuarios'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'config.configuracion', 'description' => 'Configuraciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'config.opciones', 'description' => 'Opciones'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'search', 'description' => 'Busqueda de Facturas'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'cuentas.pendientes', 'description' => 'Cuentas Pendientes'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'facturacion.emitidas', 'description' => 'Facturas Emitidas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'facturacion.ultimas', 'description' => 'Ultimas Facturas'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'comandero.mesas', 'description' => 'App Mesas'])->syncRoles([$role1, $role2, $role3, $role4, $role5, $role6]);
        Permission::create(['name' => 'comandero.inicio', 'description' => 'App Agregar'])->syncRoles([$role1, $role2, $role3, $role4, $role5, $role6]);
        Permission::create(['name' => 'comandero.cambios', 'description' => 'App Cambios'])->syncRoles([$role1, $role2, $role3, $role4, $role5, $role6]);

        Permission::create(['name' => 'roles.index', 'description' => 'Roles y Permisos'])->syncRoles([$role1]);

    }
}