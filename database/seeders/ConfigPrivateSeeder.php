<?php

namespace Database\Seeders;

use App\Models\ConfigPrivate;
use Illuminate\Database\Seeder;

class ConfigPrivateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ConfigPrivate::create([
            'sys_login' => 1,
            'just_data' => 0,
            'data_special' => 0,
            'sync_time' => 5,
            'print' => 1,
            'pusher' => 0,
            'livewire_path' => 'http://sistema.test'
        ]);
    }
}
