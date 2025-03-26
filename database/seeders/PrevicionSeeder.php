<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrevicionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('previcion')->insert([
            ['nom_previcion' => 'FONASA'],
            ['nom_previcion' => 'Isapre'],
            ['nom_previcion' => 'Dipreca'],
            ['nom_previcion' => 'Capredena'],
            ['nom_previcion' => 'Sin previsión'],
            ['nom_previcion' => 'Otra'],
        ]);
    }
}
