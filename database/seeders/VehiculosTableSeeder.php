<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class VehiculosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clientesids = DB::table('clientes')->pluck('id')->toArray();
        $faker = Faker::create();

        for ($y = 1; $y <= 10; $y++) {

            if (empty($clientesids)) {
                break; // Si no hay más IDs disponibles, salir del bucle
            }

            $id=array_rand($clientesids);
            $idcliente=$clientesids[$id];
            unset($clientesids[$id]);
            Vehiculo::create([
                'patente'=>strtoupper($faker->regexify('[A-Z]{4}[0-9]{2}')),
                'id_cliente'=>$idcliente
            ]);

        }
    }
}
