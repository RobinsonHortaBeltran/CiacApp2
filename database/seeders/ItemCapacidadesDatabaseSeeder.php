<?php

namespace Database\Seeders;

use App\Models\ItemCapacidades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemCapacidadesDatabaseSeeder extends Seeder
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
                'name' => 'A-29',
                'tipo_sub_capaciodad' => '1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'A-37',
                'tipo_sub_capaciodad' => '1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'B-727',
                'tipo_sub_capaciodad' => '1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'B-1900/B-200/B-300/350',
                'tipo_sub_capaciodad' => '1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'C-40',
                'tipo_sub_capaciodad' => '1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'C-90',
                'tipo_sub_capaciodad' => '1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'C-95',
                'tipo_sub_capaciodad' => '1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'C-130',
                'tipo_sub_capaciodad' => '1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'C-208',
                'tipo_sub_capaciodad' => '1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'C-212',
                'tipo_sub_capaciodad' => '1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'CN-235',
                'tipo_sub_capaciodad' => '1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'C-295',
                'tipo_sub_capaciodad' => '1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'T-41',
                'tipo_sub_capaciodad' => '1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'T-90',
                'tipo_sub_capaciodad' => '1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'ATR 42',
                'tipo_sub_capaciodad' => '1',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'B-206/212/412',
                'tipo_sub_capaciodad' => '2',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'UH-1H/N',
                'tipo_sub_capaciodad' => '2',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'Huey II',
                'tipo_sub_capaciodad' => '2',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'UH-60',
                'tipo_sub_capaciodad' => '2',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'Boeing (727 / 737)',
                'tipo_sub_capaciodad' => '3',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'Beechcraft King B-200/B-300',
                'tipo_sub_capaciodad' => '3',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'Cessna Caravan C-208',
                'tipo_sub_capaciodad' => '3',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'Twin Commander 690 A',
                'tipo_sub_capaciodad' => '3',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'Piper PA-31T Cheyenne II',
                'tipo_sub_capaciodad' => '3',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'ATR 42',
                'tipo_sub_capaciodad' => '3',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'Airbus A-320',
                'tipo_sub_capaciodad' => '3',
                'status' => '1',
                'creator' => '1'
            ],
            [
                'name' => 'ATR-72',
                'tipo_sub_capaciodad' => '3',
                'status' => '1',
                'creator' => '1'
            ]
        ];

        foreach ($tipos_sub_capacidades as $tipo_sub_capacidad) {
            ItemCapacidades::create($tipo_sub_capacidad);
        }
    }
}
