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

        Permission::create(['name' => 'caja.aperturar'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'caja.select'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'caja.selected'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'caja.ordenes'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'venta.rapida'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'venta.mesas'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'venta.delivery'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'venta.cambios'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'categoria.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'opcion.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'producto'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'corte.index'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'efectivo.cuentas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'efectivo.categorias'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'efectivo.remesas'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'efectivo.gastos'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'efectivo.ingreso'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'efectivo.transacciones'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'historial.reporte'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'historial.ventas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'historial.gastos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'historial.cortes'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'historial.meseros'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'historial.ordenes'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'historial.eliminadas'])->syncRoles([$role1, $role2, $role3]);


        Permission::create(['name' => 'panel.control'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'panel.ordenes'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'directorio.clientes'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'directorio.proveedores'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'directorio.repartidores'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'config.usuarios'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'config.configuracion'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'config.opciones'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'search'])->syncRoles([$role1]);
        Permission::create(['name' => 'cuentas.pendientes'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        Permission::create(['name' => 'facturacion.emitidas'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'facturacion.ultimas'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name' => 'comandero.mesas'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'comandero.inicio'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'comandero.cambios'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

    }
}