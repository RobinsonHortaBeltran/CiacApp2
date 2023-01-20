<?php

namespace Database\Seeders;

use App\Models\Proveedores;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedoresDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proveedores = [
            [
                'name' => 'Robinson horta ',
                'email'=> 'hortarobinson@gmail.com',
                'creator'=> '1',
                'status' => '1',
                'code'   => '1',

            ],
            [
                'name' => 'Robinson horta 2',
                'email'=> 'hortarobinson2@gmail.com',
                'creator'=> '1',
                'status' => '1',
                'code'   => '2',
            ],
            [
                'name' => 'Robinson horta 3',
                'email'=> 'hortarobinson3@gmail.com',
                'creator'=> '1',
                'status' => '1',
                'code'   => '3',
            ],
            [
                'name' => 'Robinson horta 4',
                'email'=> 'hortarobinson4@gmail.com',
                'creator'=> '1',
                'status' => '1',
                'code'   => '4',
            ],
            [
                'name' => 'Robinson horta 5',
                'email'=> 'hortarobinson5@gmail.com',
                'creator'=> '1',
                'status' => '1',
                'code'   => '5',
            ],
            [
                'name' => 'Robinson horta 6',
                'email'=> 'hortarobinson6@gmail.com',
                'creator'=> '1',
                'status' => '1',
                'code'   => '6',
            ],

        ];

        foreach ($proveedores as $proveedo) {
            Proveedores::create($proveedo);
        }
    }
}
