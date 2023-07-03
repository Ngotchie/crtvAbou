<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sites')->insert([

            [
                'id' => '1',
                'id_ville' => '1',
                'id_region' => '1',
                'intitule' => 'Centre de Diffusion FM/TV'
            ],
            [
                'id' => '2',
                'id_ville' => '2',
                'id_region' => '1',
                'intitule' => 'Centre de Diffusion'
            ],
            [
                'id' => '3',
                'id_ville' => '3',
                'id_region' => '1',
                'intitule' => '0'
            ],
            [
                'id' => '4',
                'id_ville' => '3',
                'id_region' => '1',
                'intitule' => 'A05894'
            ],
            [
                'id' => '5',
                'id_ville' => '3',
                'id_region' => '1',
                'intitule' => 'Centre de Diffusion'
            ],
            [
                'id' => '6',
                'iid_villed' => '3',
                'id_region' => '1',
                'intitule' => 'Centre de diffusion Ngaoundere'
            ],
            [
                'id' => '7',
                'id_ville' => '3',
                'id_region' => '1',
                'intitule' => 'Station Regional'
            ],
            [
                'id' => '8',
                'id_ville' => '3',
                'id_region' => '1',
                'intitule' => 'Station Régionale'
            ],
            [
                'id' => '9',
                'id_ville' => '3',
                'id_region' => '1',
                'intitule' => 'Station régionale /FM'
            ],
            [
                'id' => '10',
                'id_ville' => '3',
                'id_region' => '1',
                'intitule' => 'Station Regionale de Ngaoundere'
            ],
            [
                'id' => '11',
                'id_ville' => '4',
                'id_region' => '1',
                'intitule' => 'Centre de Diffusion'
            ],
            [
                'id' => '12',
                'id_ville' => '4',
                'id_region' => '1',
                'intitule' => 'Centre de diffusion FM TV TIBATI'
            ],
            [
                'id' => '13',
                'id_ville' => '4',
                'id_region' => '1',
                'intitule' => 'Centre de Diffusion FM/TV'
            ],
            [
                'id' => '14',
                'id_ville' => '5',
                'id_region' => '2',
                'intitule' => 'centre de diffusion bafia'
            ],
            [
                'id' => '15',
                'id_ville' => '5',
                'id_region' => '2',
                'intitule' => 'Centre de diffusion de Bafia'
            ],
            [
                'id' => '16',
                'id_ville' => '6',
                'id_region' => '2',
                'intitule' => 'Centre de formation d’Ekounou'
            ],
            [
                'id' => '17',
                'id_ville' => '8',
                'id_region' => '2',
                'intitule' => 'centre de diffusion de mbankolo'
            ],
            [
                'id' => '18',
                'id_ville' => '9',
                'id_region' => '2',
                'intitule' => 'Centre de diffusion de Nanga-Eboko'
            ],
            [
                'id' => '19',
                'id_ville' => '9',
                'id_region' => '2',
                'intitule' => 'centre de diffusion nanga eboko'
            ],
            [
                'id' => '20',
                'id_ville' => '10',
                'id_region' => '2',
                'intitule' => 'Centre de diffusion de Ndom'
            ],
            [
                'id' => '21',
                'id_ville' => '11',
                'id_region' => '2',
                'intitule' => '0'
            ],
            [
                'id' => '22',
                'id_ville' => '11',
                'id_region' => '2',
                'intitule' => 'Centre de diffusion de Soa'
            ],
            [
                'id' => '23',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Centre de Diffusion'
            ],
            [
                'id' => '24',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => '0    '
            ],
            [
                'id' => '25',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Centre de Diffusion AM/Radio'
            ],
            [
                'id' => '26',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Centre de Diffusion de Mbankolo'
            ],
            [
                'id' => '27',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'centre de diffusion de soa'
            ],
            [
                'id' => '28',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Centre de Diffusion FM/TV'
            ],
            [
                'id' => '29',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Centre de Formation d"\'"\Ekounou'
            ],
            [
                'id' => '30',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'CMCA'
            ],
            [
                'id' => '31',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Complexe CRTV'
            ],
            [
                'id' => '32',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Complexe CRTV Centre '
            ],
            [
                'id' => '33',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'FM 94'
            ],
            [
                'id' => '34',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'IFCPA '
            ],
            [
                'id' => '35',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'IMMEUBLE CMCA ( service administratif de la radio centre )'
            ],
            [
                'id' => '36',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Immeuble de la Radio'
            ],
            [
                'id' => '37',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Immeuble Siege Mballa 2'
            ],
            [
                'id' => '38',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Maison de la Radio'
            ],
            [
                'id' => '39',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Poste national Nglongkak'
            ],
            [
                'id' => '40',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Radio Centre'
            ],
            [
                'id' => '41',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Station Régionale'
            ],
            [
                'id' => '42',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Immeuble CMCA/FM94'
            ],
            [
                'id' => '43',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Immeuble de la Radio'
            ],
            [
                'id' => '44',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Immeuble siège   '
            ],
            [
                'id' => '45',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Siège Social Mballa 2'
            ],
            [
                'id' => '46',
                'id_ville' => '13',
                'id_region' => '3',
                'intitule' => 'Centre de Diffusion'
            ],
            [
                'id' => '47',
                'id_ville' => '13',
                'id_region' => '3',
                'intitule' => 'Centre de Diffusion FM/TV'
            ],
            [
                'id' => '48',
                'id_ville' => '14',
                'id_region' => '3',
                'intitule' => 'Centre Haute Fréquence '
            ],
            [
                'id' => '49',
                'id_ville' => '14',
                'id_region' => '3',
                'intitule' => 'Centre de Diffusion FM/TV'
            ],
            [
                'id' => '50',
                'id_ville' => '14',
                'id_region' => '3',
                'intitule' => 'Station Régionale'
            ],
            [
                'id' => '51',
                'id_ville' => '14',
                'id_region' => '3',
                'intitule' => 'Station Régionale et FM'
            ],
            [
                'id' => '52',
                'id_ville' => '14',
                'id_region' => '3',
                'intitule' => 'Centre haute frequence '
            ],
            [
                'id' => '53',
                'id_ville' => '14',
                'id_region' => '3',
                'intitule' => 'Station Régionale et FM'
            ],
            [
                'id' => '54',
                'id_ville' => '15',
                'id_region' => '3',
                'intitule' => 'Centre de Diffusion'
            ],
            [
                'id' => '55',
                'id_ville' => '15',
                'id_region' => '3',
                'intitule' => 'Centre de Diffusion FM/TV'
            ],
            [
                'id' => '56',
                'id_ville' => '16',
                'id_region' => '4',
                'intitule' => 'Centre de Diffusion'
            ],
            [
                'id' => '57',
                'id_ville' => '16',
                'id_region' => '4',
                'intitule' => 'Centre de Diffusion FM/TV'
            ],
            [
                'id' => '58',
                'id_ville' => '17',
                'id_region' => '4',
                'intitule' => 'centre de diffusion FM/TV'
            ],
            [
                'id' => '59',
                'id_ville' => '17',
                'id_region' => '4',
                'intitule' => 'centre mincom makari'
            ],
            [
                'id' => '60',
                'id_ville' => '18',
                'id_region' => '4',
                'intitule' => 'Centre de Diffusion FM/TV '
            ],
            [
                'id' => '61',
                'id_ville' => '18',
                'id_region' => '4',
                'intitule' => 'Station Régionale '
            ],
            [
                'id' => '62',
                'id_ville' => '18',
                'id_region' => '4',
                'intitule' => 'Centre de diffusion '
            ],
            [
                'id' => '63',
                'id_ville' => '18',
                'id_region' => '4',
                'intitule' => 'Station régionale /FM '
            ],
            [
                'id' => '64',
                'id_ville' => '19',
                'id_region' => '4', 
                'intitule' => 'Centre de Diffusion'
            ],
            [
                'id' => '65',
                'id_ville' => '19',
                'id_region' => '4', 
                'intitule' => 'Station Régionale'
            ],
            [
                'id' => '66',
                'id_ville' => '20',
                'id_region' => '4',
                'intitule' => 'centre de diffusion FM/TV'
            ],
            [
                'id' => '67',
                'id_ville' => '20',
                'id_region' => '4',
                'intitule' => 'centre fm/tv'
            ],
            [
                'id' => '68',
                'id_ville' => '20',
                'id_region' => '4',
                'intitule' => 'centre fm/tv de mora'
            ],
            [
                'id' => '69',
                'id_ville' => '21',
                'id_region' => '4',
                'intitule' => 'Centre de Diffusion FM/TV'
            ],
            [
                'id' => '70',
                'id_ville' => '22',
                'id_region' => '5',
                'intitule' => 'centre de diffusion de logbessou delocalisé à AKWA'
            ],
            [
                'id' => '71',
                'id_ville' => '23',
                'id_region' => '5',
                'intitule' => 'Direction regional littoral'
            ],
            [
                'id' => '72',
                'id_ville' => '23',
                'id_region' => '5',
                'intitule' => 'Station Régionale'
            ],
            [
                'id' => '73',
                'id_ville' => '23',
                'id_region' => '5', 
                'intitule' => '0'
            ],
            [
                'id' => '74',
                'id_ville' => '24',
                'id_region' => '5', 
                'intitule' => 'Complexe CRTV'
            ],
            [
                'id' => '75',
                'id_ville' => '24',
                'id_region' => '5', 
                'intitule' => 'Centre de diffusion'
            ],
            [
                'id' => '76',
                'id_ville' => '24',
                'id_region' => '5', 
                'intitule' => 'Centre Haute Fréquence de New-Bell'
            ],
            [
                'id' => '77',
                'id_ville' => '24',
                'id_region' => '5', 
                'intitule' => 'Complexe CRTV de Bonanjo (administratif)'
            ],
            [
                'id' => '78',
                'id_ville' => '24',
                'id_region' => '5', 
                'intitule' => 'Direction régionale du littoral'
            ],
            [
                'id' => '79',
                'id_ville' => '25',
                'id_region' => '5',
                'intitule' => 'centre de diffusion de Logbessou'
            ],
            [
                'id' => '80',
                'id_ville' => '25',
                'id_region' => '5',
                'intitule' => 'centre de diffusion FM/TV de Logbessou'
            ],
            [
                'id' => '81',
                'id_ville' => '26',
                'id_region' => '5',
                'intitule' => 'Centre de Diffusion'
            ],
            [
                'id' => '82',
                'id_ville' => '26',
                'id_region' => '5',
                'intitule' => 'centre de diffusion FM/TV'
            ],
            [
                'id' => '83',
                'id_ville' => '26',
                'id_region' => '5',
                'intitule' => 'centre de diffusion FM/TV de Ndom'
            ],
            [
                'id' => '84',
                'id_ville' => '27',
                'id_region' => '5',
                'intitule' => 'Centre de diffusion de Nkongsamba'
            ],
            [
                'id' => '85',
                'id_ville' => '27',
                'id_region' => '5',
                'intitule' => 'centre de diffusion FM TV'
            ],
            [
                'id' => '86',
                'id_ville' => '27',
                'id_region' => '5',
                'intitule' => 'Centre de diffusion FM/TV'
            ],
            [
                'id' => '87',
                'id_ville' => '28',
                'idegion' => '6',
                'intitule' => 'haute frequence garoua'
            ],
            [
                'id' => '88',
                'id_ville' => '28',
                'idegion' => '6',
                'intitule' => 'Centre de Diffusion FM/TV'
            ],
            [
                'id' => '89',
                'id_ville' => '28',
                'idegion' => '6',
                'intitule' => 'Station Régionale'
            ],
            [
                'id' => '90',
                'id_ville' => '28',
                'idegion' => '6',
                'intitule' => 'Station régionale /FM'
            ],
            [
                'id' => '91',
                'id_ville' => '28',
                'idegion' => '6',
                'intitule' => 'Centre haute frequence'
            ],
            [
                'id' => '92',
                'id_ville' => '29',
                'id_region' => '6',
                'intitule' => 'Centre de Diffusion FM/TV'
            ],
            [
                'id' => '93',
                'id_ville' => '29',
                'id_region' => '6',
                'intitule' => 'Centre de Diffusion'
            ],
            [
                'id' => '94',
                'id_ville' => '30',
                'id_region' => '6',
                'intitule' => 'centre de diffusion'
            ],
            [
                'id' => '95',
                'id_ville' => '30',
                'id_region' => '6',
                'intitule' => 'Centre de diffusion FM /TV'
            ],
            [
                'id' => '96',
                'id_ville' => '31',
                'id_region' => '6',
                'intitule' => 'centre de diffusion'
            ],
            [
                'id' => '97',
                'id_ville' => '31',
                'id_region' => '6',
                'intitule' => 'Centre de Diffusion FM/TV'
            ],
            [
                'id' => '98',
                'id_ville' => '32',
                'id_region' => '7',
                'intitule' => 'centre de diffusion de bamenda'
            ],
            [
                'id' => '99',
                'id_ville' => '32',
                'id_region' => '7',
                'intitule' => 'station regionale de bamenda'
            ],
            [
                'id' => '100',
                'id_ville' => '32',
                'id_region' => '7',
                'intitule' => 'station regionale FM De Bamenda'
            ],
            [
                'id' => '101',
                'id_ville' => '32',
                'id_region' => '7',
                'intitule' => 'Station Regional FM(BAMENDA)'
            ],
            [
                'id' => '102',
                'id_ville' => '33',
                'id_region' => '8',
                'intitule' => 'Centre de diffusion de Bafoussam'
            ],
            [
                'id' => '103',
                'id_ville' => '33',
                'id_region' => '8',
                'intitule' => 'centre de diffusion FM/TV de Bangou'
            ],
            [
                'id' => '104',
                'id_ville' => '33',
                'id_region' => '8',
                'intitule' => 'centre de diffusion haute frequence bafoussam-banengo'
            ],
            [
                'id' => '105',
                'id_ville' => '33',
                'id_region' => '8',
                'intitule' => 'centre de diffusion HF de bafoussam-banengo'
            ],
            [
                'id' => '106',
                'id_ville' => '33',
                'id_region' => '8',
                'intitule' => 'centre de division FM/TV de Bangou'
            ],
            [
                'id' => '107',
                'id_ville' => '33',
                'id_region' => '8',
                'intitule' => 'centre de production FM'
            ],
            [
                'id' => '108',
                'id_ville' => '33',
                'id_region' => '8',
                'intitule' => 'centre de production pola FM 104.7'
            ],
            [
                'id' => '109',
                'id_ville' => '33',
                'id_region' => '8',
                'intitule' => 'centre de production regional de l"\'"\ouest'
            ],
            [
                'id' => '110',
                'id_ville' => '33',
                'id_region' => '8',
                'intitule' => 'Centre HF de Bafoussam-'
            ],
            [
                'id' => '111',
                'id_ville' => '33',
                'id_region' => '8',
                'intitule' => 'Centre Haute fréquence de Bafoussam'
            ],
            [
                'id' => '112',
                'id_ville' => '33',
                'id_region' => '8',
                'intitule' => 'Station régionale Bafoussam'
            ],
            [
                'id' => '113',
                'id_ville' => '34',
                'id_region' => '8',
                'intitule' => 'Centre de diffusion de Bangou'
            ],
            [
                'id' => '114',
                'id_ville' => '35',
                'id_region' => '8',
                'intitule' => 'Centre de Diffusion de Dschang'
            ],
            [
                'id' => '115',
                'id_ville' => '36',
                'id_region' => '9',
                'intitule' => 'Centre de Diffusion'
            ],
            [
                'id' => '116',
                'id_ville' => '36',
                'id_region' => '9',
                'intitule' => 'Station Regionale'
            ],
            [
                'id' => '117',
                'id_ville' => '37',
                'id_region' => '9',
                'intitule' => '0'
            ],
            [
                'id' => '118',
                'id_ville' => '37',
                'id_region' => '9',
                'intitule' => 'Centre de diffusion d’Ebolowa'
            ],
            [
                'id' => '119',
                'id_ville' => '37',
                'id_region' => '9',
                'intitule' => 'Complexe CRTV'
            ],
            [
                'id' => '120',
                'id_ville' => '37',
                'id_region' => '9',
                'intitule' => 'Station Régionale et FM Ebolowa'
            ],
            [
                'id' => '121',
                'id_ville' => '37',
                'id_region' => '9',
                'intitule' => 'Station Régionale'
            ],
            [
                'id' => '122',
                'id_ville' => '38',
                'id_region' => '9',
                'intitule' => '0'
            ],
            [
                'id' => '123',
                'id_ville' => '38',
                'id_region' => '9',
                'intitule' => 'Centre de Diffusion FM/TV'
            ],
            [
                'id' => '124',
                'id_ville' => '38',
                'id_region' => '9',
                'intitule' => 'Centre de Diffusion de Kribi'
            ],
            [
                'id' => '125',
                'id_ville' => '38',
                'id_region' => '9',
                'intitule' => 'FM KRIBI'
            ],
            [
                'id' => '126',
                'id_ville' => '38',
                'id_region' => '9',
                'intitule' => 'Station Régionale '
            ],
            [
                'id' => '127',
                'id_ville' => '39',
                'id_region' => '9',
                'intitule' => '0'
            ],
            [
                'id' => '128',
                'id_ville' => '39',
                'id_region' => '9',
                'intitule' => 'Centre de Diffusion de Lolodorf'
            ],
            [
                'id' => '129',
                'id_ville' => '39',
                'id_region' => '9',
                'intitule' => 'Station Régionale '
            ],
            [
                'id' => '130',
                'id_ville' => '40',
                'id_region' => '9',
                'intitule' => 'Centre de Diffusion'
            ],
            [
                'id' => '131',
                'id_ville' => '40',
                'id_region' => '9',
                'intitule' => 'Station Régionale'
            ],
            [
                'id' => '132',
                'id_ville' => '41',
                'id_region' => '9',
                'intitule' => 'Station Regionale'
            ],
            [
                'id' => '133',
                'id_ville' => '41',
                'id_region' => '9',
                'intitule' => 'Centre de Diffusion '
            ],
            [   'id' => '134',
                'id_ville' => '42',
                'id_region' => '10',
                'intitule' => '0'
            ],
            [
                'id' => '135',
                'id_ville' => '42',
                'id_region' => '10',
                'intitule' => 'Centre de Diffusion'
            ],
            [
                'id' => '136',
                'id_ville' => '42',
                'id_region' => '10',
                'intitule' => 'Centre de diffusion de Bimbia'
            ],
            [
                'id' => '137',
                'id_ville' => '42',
                'id_region' => '10',
                'intitule' => 'Complexe CRTV'
            ],
            [
                'id' => '138',
                'id_ville' => '43',
                'id_region' => '10',
                'intitule' => 'Centre de diffusion de Makari'
            ],
            [
                'id' => '139',
                'id_ville' => '43',
                'id_region' => '10',
                'intitule' => 'Centre Haute fréquence de Buea'
            ],  
            [
                'id' => '140',
                'id_ville' => '43',
                'id_region' => '10',
                'intitule' => 'Complexe CRTV '
            ], 
            [
                'id' => '141',
                'id_ville' => '43',
                'id_region' => '10',
                'intitule' => 'MCFM'
            ], 
            [
                'id' => '142',
                'id_ville' => '43',
                'id_region' => '10',
                'intitule' => 'MOUNT CAMEROON FM'
            ], 
            [
                'id' => '143',
                'id_ville' => '43',
                'id_region' => '10',
                'intitule' => 'Station Régionale'
            ],  
            [
                'id' => '144',
                'id_ville' => '43',
                'id_region' => '10',
                'intitule' => 'Station régionale et FM Buea'
            ],
            [
                'id' => '145',
                'id_ville' => '7',
                'id_region' => '2',
                'intitule' => 'Centre de diffusion d"\'"\Eséka'
            ],           
            [
                'id' => '146',
                'id_ville' => '12',
                'id_region' => '2',
                'intitule' => 'Station Régionale et FM '
            ],
        ]);
    }
}
