<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PueblosOriginariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pueblo_originario')->insert([
            ['nom_puebl_originario' => 'Mapuche'],
            ['nom_puebl_originario' => 'Aymara'],
            ['nom_puebl_originario' => 'Quechua'],
            ['nom_puebl_originario' => 'Atacameño'],
            ['nom_puebl_originario' => 'Colla'],
            ['nom_puebl_originario' => 'Diaguita'],
            ['nom_puebl_originario' => 'Rapa Nui'],
            ['nom_puebl_originario' => 'Kawésqar'],
            ['nom_puebl_originario' => 'Yagán'],
            ['nom_puebl_originario' => 'Otros'],
        ]);
    }
}
