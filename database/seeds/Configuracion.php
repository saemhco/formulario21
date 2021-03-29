<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Configuracion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos')->insert([
            [
                'nombre' => "LOCADOR DE SERVICIOS",
                'descripcion' => "terceros",
            ],
            [
                'nombre' => "DOCENTE",
                'descripcion' => " ASDE, ASTC, ASTP, AXDE, AXTC, AXTP, JPDE, JPTC, JPTP, PDE, PTC, PTP",
            ],
            [
                'nombre' => "CONTRATADO CAS",
                'descripcion' => "Personal CAS",
            ],
            [
                'nombre' => "ADMINISTRATIVO NOMBRADO",
                'descripcion' => "276",
            ],
            [
                'nombre' => "ADMINISTRATIVO CONTRATADO",
                'descripcion' => "Administrativo antiguo, pero no está nombrado",
            ],
        ]);
    }
}
