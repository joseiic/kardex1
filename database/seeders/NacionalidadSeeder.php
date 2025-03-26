<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NacionalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nacionalidad')->insert([
            ['nom_nacionalidad' => 'Chilena'],
            ['nom_nacionalidad' => 'Argentina'],
            ['nom_nacionalidad' => 'Boliviana'],
            ['nom_nacionalidad' => 'Peruana'],
            ['nom_nacionalidad' => 'Colombiana'],
            ['nom_nacionalidad' => 'Venezolana'],
            ['nom_nacionalidad' => 'Ecuatoriana'],
            ['nom_nacionalidad' => 'Brasileña'],
            ['nom_nacionalidad' => 'Uruguaya'],
            ['nom_nacionalidad' => 'Paraguaya'],
            ['nom_nacionalidad' => 'Otras'],
        ]);
    }
}
