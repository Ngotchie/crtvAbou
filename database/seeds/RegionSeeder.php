<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$Sheet3.$D$3:F$302
        DB::table('regions')->insert([
            [
                'id' => '1',
                'intitule' => 'ADAMAOUA'
            ],
            [
                'id' => '2',
                'intitule' => 'CENTRE'
            ],
            [
                'id' => '3',
                'intitule' => 'EST'
            ],
            [
                'id' => '4',
                'intitule' => 'EXTREME-NORD'
            ],
            [
                'id' => '5',
                'intitule' => 'LITORAL'
            ],
            [
                'id' => '6',
                'intitule' => 'NORD'
            ],
            [
                'id' => '7',
                'intitule' => 'NORD-OUEST'
            ],
            [
                'id' => '8',
                'intitule' => 'OUEST'
            ],
            [
                'id' => '9',
                'intitule' => 'SUD'
            ],
            [
                'id' => '10',
                'intitule' => 'SUD-OUEST'
            ]
        ]);
    }
}
