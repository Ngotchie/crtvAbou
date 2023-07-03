<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ElementDetenteurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('element_detenteurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('assets_number')->nullable();
            $table->string('region')->nullable();
            $table->string('ville')->nullable();
            $table->string('site')->nullable();
            $table->string('title')->nullable();
            $table->string('number')->nullable();
            $table->string('nom_article')->nullable();
            $table->string('type_dimmobilisation')->nullable();
            $table->string('statut_de_larticle')->nullable();
            $table->string('nom_agent_collecteur')->nullable();
            $table->string('ligne_annexe')->nullable();
            $table->string('valeur_origine')->nullable();
            $table->string('date_mes_cptable')->nullable();
            $table->string('taux_amortissement')->nullable();
            $table->string('duree_de_vie')->nullable();
            $table->string('date_amortissement')->nullable();
            $table->string('cumul_dotations_2017')->nullable();
            $table->string('vnc_2017')->nullable();
            $table->string('cumul_dotations_2018')->nullable();
            $table->string('vnc_2018')->nullable();
            $table->string('valeur_a_dire_experts')->nullable();
            $table->string('ecart_de_reevaluation')->nullable();
            $table->string('nns')->nullable();
            $table->string('date_acquisition')->nullable();
            $table->string('quantite')->nullable();
            $table->string('valeur_amortissement')->nullable();
            $table->string('valeur_net')->nullable();
            $table->string('valeur')->nullable();
            $table->string('date_affectation')->nullable();
            $table->string('lieu_affectation')->nullable();
            $table->string('observation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('element_detenteurs');
    }
}
