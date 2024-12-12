<?php

namespace Database\Seeders;
use App\Models\Valor;
use App\Models\Estacionamiento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ValorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $estacionamientosIds = DB::table('estacionamientos')->pluck('id')->toArray();
        Valor::create([
            'id_estacionamiento'=>$estacionamientosIds[array_rand($estacionamientosIds)],
            'valor_minuto'=>$faker->numberBetween(10, 500),
            'cantidad_lugares'=>20
        ]);
    }
}
