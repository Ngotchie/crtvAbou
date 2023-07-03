<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TypeImmobilisations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_immobilisations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('intitule')->nullable();
            $table->unsignedInteger('id_nns');

            $table->foreign('id_nns')
            ->references('id')
            ->on('nns')
            ->onDelete('restrict')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('type_immobilisations');
    }
}
