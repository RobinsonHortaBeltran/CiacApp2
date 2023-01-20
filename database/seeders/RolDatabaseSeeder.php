<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Administrador',
                'status' => '1'
            ],
            [
                'name' => 'Usuario',
                'status' => '1'
            ],
            [
                'name' => 'Proveedor',
                'status' => '1'
            ],

        ];

        foreach ($roles as $role) {
            Roles::create($role);
        }
    }
}
