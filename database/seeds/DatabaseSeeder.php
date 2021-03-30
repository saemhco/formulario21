<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Configuracion::class);
        $this->call(Personal::class);
        
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'unheval@email.com',
            'password' => bcrypt('Unheval21')
        ]);
    }
}
