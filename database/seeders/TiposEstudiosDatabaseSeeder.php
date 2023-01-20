<?php

namespace Database\Seeders;

use App\Models\TiposEstudios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiposEstudiosDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos_estudios = [
            [
                'name' => 'ESTUDIO MERCADO SERVICIOS',
                'status' => '1',
                'creator'=> '1'
            ],
            [
                'name' => 'ESTUDIO DE MERCADO',
                'status' => '1',
                'creator'=> '1'
            ],
            [
                'name' => 'ESTUDIO DE MERCADO ADQUISICIONES',
                'status' => '1',
                'creator'=> '1'
            ],
            [
                'name' => 'ESTUDIO MERCADO CURSOS',
                'status' => '1',
                'creator'=> '1'
            ],

        ];

        foreach ($tipos_estudios as $tipo_estudio) {
            TiposEstudios::create($tipo_estudio);
        }
    }
}
