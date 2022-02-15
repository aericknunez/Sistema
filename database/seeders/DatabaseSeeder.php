<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(ConfigAppSeeder::class);
        $this->call(ConfigMonedaSeeder::class);
        $this->call(ConfigPanelesSeeder::class);
        $this->call(ConfigImpresionSeeder::class);
        $this->call(ConfigPrincipalSeeder::class);
        $this->call(ConfigRootSeeder::class);
        $this->call(EfectivoCuentaBancosSeeder::class);
        $this->call(EfectivoGastosCategoriasSeeder::class);
        $this->call(ImageCategorySeeder::class);
        $this->call(ImageSeeder::class);
        $this->call(NumeroCajasSeeder::class);
        $this->call(ProductoCategoriaSeeder::class);
        $this->call(SyncTableSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(InvUnidadesSeeder::class);
    }
}
