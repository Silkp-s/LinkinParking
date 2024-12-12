<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LugarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $valors = DB::table('valors')->pluck('id')->toArray();
        $lugares = [];


        // Generar lugares para posx = 1
        for ($y = 1; $y <= 10; $y++) {
            $lugares[] = [
                'posx' => 1,
                'posy' => $y,
                'lugar_matriz' => "1{$y}",
                'ocupado' => 0,
                'id_valors'=>$valors[array_rand($valors)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Generar lugares para posx = 2
        for ($y = 1; $y <= 10; $y++) {
            $lugares[] = [
                'posx' => 2,
                'posy' => $y,
                'lugar_matriz' => "2{$y}",
                'ocupado' => 0,
                'id_valors'=>$valors[array_rand($valors)],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('lugars')->insert($lugares);
    }
}
