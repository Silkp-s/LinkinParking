<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            EstacionamientoTableSeeder::class,
            clientesTableSeeder::class,
            ValorsTableSeeder::class,
            VehiculosTableSeeder::class,
            LugarsTableSeeder::class
        ]);
     
    }
}
