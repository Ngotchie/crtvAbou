<?php

use Illuminate\Database\Seeder;

class DetenteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('detenteurs')->insert([
            [
                'id' => '1',
                'nom' => 'ATANGANA BOMBA T'
            ],
            [
                'id' => '2',
                'nom' => 'AWOU Marthe Leopoldine'
            ],
            [
                'id' => '3',   
                'nom' => 'BOMBA ATANGANA'
            ],
            [
                'id' => '4',
                'nom' => 'DAN epse DJANTENG Carmen Melisa'
            ],
            [
                'id' => '5',
                'nom' => 'DONG A MOUNYOL'
            ],
            [
                'id' => '6',
                'nom' => 'ETOUNDI Joseph'
            ],
            [
                'id' => '7',
                'nom' => 'Eyebe Bodo Arsene'
            ],
            [
                'id' => '8',
                'nom' => 'GBETNKOM MOULIOM Alfred'
            ],
            [
                'id' => '9',
                'nom' => 'MBAKU FONJAH Junior'
            ],
            [
                'id' => '10',
                'nom' => 'MBASSA A A MBARA Gabriel'
            ],
            [
                'id' => '11',
                'nom' => 'MUOLOBO Hubert'
            ],
            [
                'id' => '12',
                'nom' => 'NYAM KEDI Armel Pafait'
            ],
            [
                'id' => '13',
                'nom' => 'OTH BOO Yvan Berger'
            ]
        ]);
    }
}
