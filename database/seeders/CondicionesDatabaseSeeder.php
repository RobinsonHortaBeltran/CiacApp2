<?php

namespace Database\Seeders;

use App\Models\Condiciones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CondicionesDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $CONDICIONES = [
            [
                'name' => 'NEW',
                'creator' => '1',
                'status' => '1',
            ],
            [
                'name' => 'AS REMOVED',
                'creator' => '1',
                'status' => '1',
            ],



        ];

        foreach ($CONDICIONES as $condicion) {
            Condiciones::create($condicion);
        }
    }
}
