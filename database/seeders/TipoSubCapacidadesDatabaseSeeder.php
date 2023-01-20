<?php

namespace Database\Seeders;

use App\Models\TipoSubCapacidades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoSubCapacidadesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos_sub_capacidades = [
            [
                'name' => 'ALA FIJA',
                'tipo_principal'=>'1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'ALA ROTATORIA',
                'tipo_principal' => '1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'ALA FIJA',
                'tipo_principal' => '2',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'UAV',
                'tipo_principal' => '2',
                'status' => '1',
                'creator' => '1'
            ]
        ];

        foreach ($tipos_sub_capacidades as $tipo_sub_capacidad) {
            TipoSubCapacidades::create($tipo_sub_capacidad);
        }
    }
}
