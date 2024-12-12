<?php

namespace Database\Seeders;
use App\Models\Cliente;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class clientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(); 

        // Generar 10 clientes aleatorios
        for ($i = 0; $i < 10; $i++) {
            $numeroBase = $faker->numberBetween(10000000, 99999999);
            $digitoVerificador = $faker->randomElement(array_merge(range(0, 9), ['K']));
            Cliente::create([
                'nombre' => $faker->name,               // Nombre aleatorio
                'rut'=>$numeroBase.'-'. $digitoVerificador,
                'created_at'=>now()
            ]);
        }
    
    }
}
