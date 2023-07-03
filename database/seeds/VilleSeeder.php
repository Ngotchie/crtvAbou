<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('villes')->insert([
            [
                'id' => '1',
                'id_region' => '1',
                'intitule' => 'Banyo'
            ],
            [
                'id' => '2',
                'id_region' => '1',
                'intitule' => 'Meiganga'
            ],
            [
                'id' => '3',
                'id_region' => '1',
                'intitule' => 'Ngaoundere'
            ],
            [
                'id' => '4',
                'id_region' => '1',
                'intitule' => 'Tibati'
            ],
            [
                'id' => '5',
                'id_region' => '2',
                'intitule' => 'Bafia'
            ],
            [
                'id' => '6',
                'id_region' => '2',
                'intitule' => 'Ekounou'
            ],
            [
                'id' => '7',
                'id_region' => '2',
                'intitule' => 'Eséka'
            ],
            [
                'id' => '8',
                'id_region' => '2',
                'intitule' => 'MBankolo'
            ],
            [
                'id' => '9',
                'id_region' => '2',
                'intitule' => 'Nanga - Eboko'
            ],
            [
                'id' => '10',
                'id_region' => '2',
                'intitule' => 'Ndom'
            ],
            [
                'id' => '11',
                'id_region' => '2',
                'intitule' => 'Soa'
            ],
            [
                'id' => '12',
                'id_region' => '2',
                'intitule' => 'Yaounde'
            ],
            [
                'id' => '13',
                'id_region' => '3',
                'intitule' => 'Abong-Mbang'
            ],
            [
                'id' => '14',
                'id_region' => '3',
                'intitule' => 'Bertoua'
            ],
            [
                'id' => '15',
                'id_region' => '3',
                'intitule' => 'Yokadouma'
            ],
            [
                'id' => '16',
                'id_region' => '4',
                'intitule' => 'Kousseri'
            ],
            [
                'id' => '17',
                'id_region' => '4',
                'intitule' => 'Makary'
            ],
            [
                'id' => '18',
                'id_region' => '4',
                'intitule' => 'Maroua '
            ],
            [
                'id' => '19',
                'id_region' => '4', 
                'intitule' => 'Mokolo'
            ],
            [
                'id' => '20',
                'id_region' => '4',
                'intitule' => 'Mora'
            ],
            [
                'id' => '21',
                'id_region' => '4',
                'intitule' => 'Yagoua'
            ],
            [
                'id' => '22',
                'id_region' => '5',
                'intitule' => 'Akwa'
            ],
            [
                'id' => '23',
                'id_region' => '5',
                'intitule' => 'Bonanjo'
            ],
            [
                'id' => '24',
                'id_region' => '5', 
                'intitule' => 'Douala'
            ],
            [
                'id' => '25',
                'id_region' => '5',
                'intitule' => 'Logbessou'
            ],
            [
                'id' => '26',
                'id_region' => '5',
                'intitule' => 'Ndom'
            ],
            [
                'id' => '27',
                'id_region' => '5',
                'intitule' => 'Nkongsamba'
            ],
            [
                'id' => '28',
                'id_region' => '6',
                'intitule' => 'Garoua'
            ],
            [
                'id' => '29',
                'id_region' => '6',
                'intitule' => 'Guider'
            ],
            [
                'id' => '30',
                'id_region' => '6',
                'intitule' => 'Mayo-Oulo'
            ],
            [
                'id' => '31',
                'id_region' => '6',
                'intitule' => 'Tcholliré'
            ],
            [
                'id' => '32',
                'id_region' => '7',
                'intitule' => 'Bamenda'
            ],
            [
                'id' => '33',
                'id_region' => '8',
                'intitule' => 'Bafoussam'
            ],
            [
                'id' => '34',
                'id_region' => '8',
                'intitule' => 'Bangou'
            ],
            [
                'id' => '35',
                'id_region' => '8',
                'intitule' => 'Dschang'
            ],
            [
                'id' => '36',
                'id_region' => '9',
                'intitule' => 'Djoum'
            ],
            [
                'id' => '37',
                'id_region' => '9',
                'intitule' => 'Ebolowa'
            ],
            [
                'id' => '38',
                'id_region' => '9',
                'intitule' => 'Kribi'
            ],
            [
                'id' => '39',
                'id_region' => '9',
                'intitule' => 'Lolodorf'
            ],
            [
                'id' => '40',
                'id_region' => '9',
                'intitule' => 'Mvomeka "\'\"a'
            ],
            [
                'id' => '41',
                'id_region' => '9',
                'intitule' => 'Sangmelima'
            ],
            [
                'id' => '42',
                'id_region' => '10',
                'intitule' => 'Bimbia'
            ],
            [
                'id' => '43',
                'id_region' => '10',
                'intitule' => 'Buea'
            ]            
        ]);
    }
}
