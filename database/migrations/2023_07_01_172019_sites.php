<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('intitule')->nullable();
            $table->unsignedInteger('id_region')->nullable();;
            $table->unsignedInteger('id_ville')->nullable();;
            $table->foreign('id_ville')
            ->references('id')
            ->on('villes')
            ->onDelete('restrict')
            ->onUpdate('cascade');
            $table->foreign('id_region')
            ->references('id')
            ->on('regions')
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
        Schema::drop('sites');
    }
}
