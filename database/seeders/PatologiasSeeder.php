<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatologiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patologia')->insert([
            ['nombre_patologia' => 'Hipertensión'],
            ['nombre_patologia' => 'Diabetes Mellitus'],
            ['nombre_patologia' => 'Insuficiencia renal crónica'],
            ['nombre_patologia' => 'Asma'],
            ['nombre_patologia' => 'Epilepsia'],
            ['nombre_patologia' => 'Cáncer'],
            ['nombre_patologia' => 'VIH/SIDA'],
            ['nombre_patologia' => 'Alzheimer'],
            ['nombre_patologia' => 'Depresión'],
            ['nombre_patologia' => 'Esquizofrenia'],
            ['nombre_patologia' => 'Obesidad'],
            ['nombre_patologia' => 'Otras enfermedades crónicas'],
        ]);
    }
}
