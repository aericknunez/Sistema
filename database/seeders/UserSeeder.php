<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run()
    {

        User::create([
                'name' => 'Erick Nunez',
                'email' => 'erick@hibridosv.com',
                'email_verified_at' => now(),
                'password' => bcrypt('007125-'),
                'remember_token' => Str::random(10),
                'tipo_usuario' => 1
        ])->assignRole('Root');

        User::create([
            'name' => 'administracion',
            'email' => 'admin@hibridosv.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Hibrido*1-'),
            'remember_token' => Str::random(10),
            'tipo_usuario' => 1
        ])->assignRole('Root');

        User::create([
            'name' => 'Gerencia',
            'email' => 'gerencia@hibridosv.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Gerente1'),
            'remember_token' => Str::random(10),
            'tipo_usuario' => 2
        ])->assignRole('Gerente');
        
        // User::factory(9)->create();
    }
    

}
