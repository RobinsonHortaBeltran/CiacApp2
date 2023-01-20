<?php

namespace Database\Seeders;

use App\Models\TipoCapacidades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoCapacidadesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipos_capacidades = [
            [
                'name' => 'Militar',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'Civil',
                'status' => '1',
                'creator' => '1'
            ]
        ];

        foreach ($tipos_capacidades as $tipo_capacidad) {
            TipoCapacidades::create($tipo_capacidad);
        }
    }
}
