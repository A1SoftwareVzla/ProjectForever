<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CerateTeamTournamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_tournament', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_tournament')->unsigned();
            $table->integer('id_team')->unsigned();

            $table->timestamps();

            //Foreign Keys
            $table->foreign('id_tournament')->references('id')->on('tournaments')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_team')->references('id')->on('teams')
                ->onDelete('cascade')
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
        //
    }
}
