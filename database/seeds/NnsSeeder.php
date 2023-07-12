<?php

use Illuminate\Database\Seeder;

class NnsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('nns')->insert([
            [
                'id' => 201,
                'intitule' => 'Matériel Spécialisé de Force Armées et Polices'
            ],
            [
                'id' => 202,
                'intitule' => 'Vivres'
            ],
            [
                'id' => 203,
                'intitule' => 'Fourrage'
            ],
            [
                'id' => 204,
                'intitule' => 'Combustibles et Liminaires'
            ],
            [
                'id' => 205,
                'intitule' => 'Effet d"\'Habillement et d"\'Equipement'
            ],
            [
                'id' => 206,
                'intitule' => 'Campement'
            ],
            [
                'id' => 207,
                'intitule' => 'Harnachement et Pansage'
            ],
            [
                'id' => 208,
                'intitule' => 'Literie et Couchage'
            ],
            [
                'id' => 209,
                'intitule' => 'Meuble et Effet d"\'Ammeublement'
            ],
            [
                'id' => 210,
                'intitule' => 'Drogue, Médicament et Obejet de Pansement'
            ],
            [
                'id' => 211,
                'intitule' => 'Ouitillage, Instruments et Appareils Divers '
            ],
            [
                'id' => 212,
                'intitule' => 'Matériel de Traction et de Voies Ferrés'
            ],
            [
                'id' => 213,
                'intitule' => 'Matériel Flottant et Accessoires'
            ],
            [
                'id' => 214,
                'intitule' => 'Matières Destinées aux Travaux'
            ],
            [
                'id' => 215,
                'intitule' => 'Ouvrages de Bibliothèque Sciences et Arts, Matériel d"\'Enseignement et Fournitures Diverses'
            ],
            [
                'id' => 216,
                'intitule' => 'Animaux Vivants'
            ],
            [
                'id' => 217,
                'intitule' => 'Tabac, Semences et Plans'
            ],
            [
                'id' => 218,
                'intitule' => 'Instruments de Musique, Gymnastique et Escrime'
            ],
            [
                'id' => 219,
                'intitule' => 'Caisses d"\'Emballage, Récipients Cadeaux, Obejets d"\'Echanges, et Objets non Classés Précédemmet'
            ],
            [
                'id' => 220,
                'intitule' => 'Matériel Denrées et Obejts Destinés à Etre Vendus'
            ],
            [
                'id' => 301,
                'intitule' => 'Immeubles Batis'
            ],
            [
                'id' => 302,
                'intitule' => 'Immeubles Non Batis'
            ]
        ]);
    }
}
