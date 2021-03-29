<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Personal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $ruta =  database_path("data/personal.json");
        $json =  file_get_contents($ruta);
        foreach(json_decode($json,true) as $key){
            DB::table('personals')->insert([
                [
                    'dni' => $key["dni"],
                    'nombres' => $key["nombres"],
                    'apellido_paterno' => $key["apellido_paterno"],
                    'apellido_materno' => $key["apellido_materno"],
                    'tipo_id' => $key["tipo"],
                    'estado' => 1,
                ],
            ]);
        }
    }
}
