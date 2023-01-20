<?php

namespace Database\Seeders;

use App\Models\TipoCapacidades;
use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call([
            RolDatabaseSeeder::class,
            UserDatabaseSeeder::class,
            TiposEstudiosDatabaseSeeder::class,
            // ProveedoresDatabaseSeeder::class
            UnidadMedidaDatabaseSeeder::class,
            FormaPagoDatabaseSeeder::class,
            CondicionesDatabaseSeeder::class,
            TipoCapacidadesDatabaseSeeder::class,
            TipoSubCapacidadesDatabaseSeeder::class,
            ItemCapacidadesDatabaseSeeder::class
        ]);
    }
}
