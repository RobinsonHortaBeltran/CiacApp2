<?php

namespace Database\Seeders;

use App\Models\UnidadMedida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadMedidaDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ums = [
            [
                'name' => 'TC3-1/centimetro cubico',
                'creator' => '1',
                'status' => '1',


            ],
            [
                'name' => 'TM3-1/metyro cubico',
                'creator' => '1',
                'status' => '1',
            ],
            [
                'name' => 'PMI-1/MINUTO',
                'creator' => '1',
                'status' => '1',
            ],
            [
                'name' => 'A-AMPERIO',
                'creator' => '1',
                'status' => '1',
            ],
            [
                'name' => 'JHR-años(annum)',
                'creator' => '1',
                'status' => '1',
            ],
            [
                'name' => 'VAL-articulo de valor',
                'creator' => '1',
                'status' => '1',
            ],
            [
                'name' => 'BAR-bar',
                'creator' => '1',
                'status' => '1',
            ],
             [
                'name' => 'Presencia Ausencia',
                'creator' => '1',
                'status' => '1',
            ],

        ];

        foreach ($ums as $um) {
            UnidadMedida::create($um);
        }
    }
}
