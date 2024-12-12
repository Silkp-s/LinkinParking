<?php

namespace Database\Seeders;
use App\Models\Estacionamiento;
use Illuminate\Database\Seeder;

class EstacionamientoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Estacionamiento::create([
            'lugar_matriz'=>1
        ]);
    }
}
