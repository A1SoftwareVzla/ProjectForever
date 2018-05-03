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
            
            $table->integer('tournament_id')->unsigned();
            $table->integer('team_id')->unsigned();

            $table->timestamps();

            //Foreign Keys
            $table->foreign('tournament_id')->references('id')->on('tournaments')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('team_id')->references('id')->on('teams')
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
