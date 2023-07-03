<?php

use Illuminate\Database\Seeder;

class TypesImmoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:table('types_immo')->insert(

            [
                'id' => '1',
                'id_nns' => '201',
                'intitule' => 'MOBILIER DE BUREAU'
            ],
            [
                'id' => '2',
                'id_nns' => '201',
                'intitule' => 'TELEVISEURS'
            ],
            [
                'id' => '3',
                'id_nns' => '201',
                'intitule' => 'MATERIEL INFORMATIQUE'
            ],
            [
                'id' => '4',
                'id_nns' => '201',
                'intitule' => 'MATERIEL DE TELECOMMUNICATION'
            ],
            [
                'id' => '5',
                'id_nns' => '201',
                'intitule' => 'MAT. TECH. CENTRE DIFF. TV'
            ],
            [
                'id' => '6',
                'id_nns' => '201',
                'intitule' => 'MATERIEL DE BUREAU'
            ],
            [
                'id' => '7',
                'id_nns' => '201',
                'intitule' => 'MAT CENT PROD RADIO'
            ],
            [
                'id' => '8',
                'id_nns' => '201',
                'intitule' => 'AUTRES MATERIEL ET OUTILLAGES'
            ],
            [
                'id' => '9',
                'id_nns' => '201',
                'intitule' => 'Terrains'
            ],
            [
                'id' => '10',
                'id_nns' => '201',
                'intitule' => 'RECEPTEURS ET LECTEURS CD'
            ],
            [
                'id' => '11',
                'id_nns' => '201',
                'intitule' => 'CAMERAS'
            ],
            [
                'id' => '12',
                'id_nns' => '201',
                'intitule' => 'MAGNETOSCOPE'
            ],
            [
                'id' => '13',
                'id_nns' => '201',
                'intitule' => 'MELANGEUR VIDEO'
            ],
            [
                'id' => '14',
                'id_nns' => '201',
                'intitule' => 'MOBILIER D"\'"\HABITATION'
            ],
            [
                'id' => '15',
                'id_nns' => '201',
                'intitule' => 'MATERIEL DE PRODUCTION TV'
            ],
            [
                'id' => '16',
                'id_nns' => '201',
                'intitule' => 'MAGNETOPHONE'
            ],
            [
                'id' => '17',
                'id_nns' => '201',
                'intitule' => 'MATERIEL DE CLIMATISATION  '
            ],
            [
                'id' => '18',
                'id_nns' => '201',
                'intitule' => 'MATERIEL DE REPORTAGE'
            ],
            [
                'id' => '19',
                'id_nns' => '201',
                'intitule' => 'VEHICULE D"\'"\EXPLOITATION LOURDS'
            ],
            [
                'id' => '20',
                'id_nns' => '201',
                'intitule' => 'AAI IMMEUBLES TV'
            ],
            [
                'id' => '21',
                'id_nns' => '201',
                'intitule' => 'Mobilier de bureau'
            ],
            [
                'id' => '22',
                'id_nns' => '201',
                'intitule' => 'Ascenseurs'
            ],
            [
                'id' => '23',
                'id_nns' => '201',
                'intitule' => 'Matériel de climatisation'
            ],
            [
                'id' => '24',
                'id_nns' => '201',
                'intitule' => 'AAI IMMEUBLES RADIO'
            ],
            [
                'id' => '25',
                'id_nns' => '201',
                'intitule' => 'MATERIEL DE CLIMATISATION'
            ],
            [
                'id' => '26',
                'id_nns' => '201',
                'intitule' => 'MATERIEL ELECTRIQUE'
            ],
            [
                'id' => '27',
                'id_nns' => '201',
                'intitule' => 'GENERATEURS DE CARACTERES'
            ],
            [
                'id' => '28',
                'id_nns' => '201',
                'intitule' => 'GROUPES ELECTROGENES'
            ],
            [
                'id' => '29',
                'id_nns' => '201',
                'intitule' => 'MATERIEL DE PRISE DE SON'
            ],
            [
                'id' => '30',
                'id_nns' => '201',
                'intitule' => 'Bat.Centre Emission Radio & Prod.Tv'
            ],[
                'id' => '31',
                'id_nns' => '201',
                'intitule' => 'VEHICULE DE TOURISME'
            ]
        );
    }
}
