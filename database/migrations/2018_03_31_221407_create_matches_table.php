<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('home_team')->unsigned();
            $table->integer('visitor_team')->unsigned();
            $table->dateTime('date');
            $table->integer('result')->default(99);
            $table->integer('id_fixture')->unsigned();
            
            $table->timestamps();

            //Foreign Keys
            $table->foreign('home_team')->references('id')->on('teams')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('visitor_team')->references('id')->on('teams')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_fixture')->references('id')->on('fixtures')
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
        Schema::dropIfExists('matches');
    }
}
