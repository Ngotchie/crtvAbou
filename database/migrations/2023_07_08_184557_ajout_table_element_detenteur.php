<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AjoutTableElementDetenteur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('element_detenteurs', function($table) {
            $table->string('departement')->nullable();
            $table->string('emplacement')->nullable();
            $table->string('statut_article')->nullable();
            $table->string('valeur_selon_fiche')->nullable();
            $table->string('source')->nullable();
            $table->string('entite')->nullable();
            $table->string('date_mise_en_service')->nullable();
        });//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('element_detenteurs');//
        //
    }
}
