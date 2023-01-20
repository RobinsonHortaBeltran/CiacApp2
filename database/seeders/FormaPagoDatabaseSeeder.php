<?php

namespace Database\Seeders;

use App\Models\FormaPago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormaPagoDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $FormaPago = [
            [
                'name' => 'K045 PAGO 45 DIAS',
                'creator' => '1',
                'status' => '1',


            ],
            [
                'name' => 'K045 PAGO 30 DIAS',
                'creator' => '1',
                'status' => '1',
            ],
            [
                'name' => 'K060 PAGO 60 DIAS',
                'creator' => '1',
                'status' => '1',
            ],
            [
                'name' => 'KO15 PAGO 15 DIAS',
                'creator' => '1',
                'status' => '1',
            ],


        ];

        foreach ($FormaPago as $fp) {
            FormaPago::create($fp);
        }
    }
}
