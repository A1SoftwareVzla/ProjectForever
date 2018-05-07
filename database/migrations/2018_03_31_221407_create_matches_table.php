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
            $table->date('date');
            $table->time('time');
            $table->integer('home_score')->unsigned()->nullable();
            $table->integer('visitor_score')->unsigned()->nullable();
            $table->integer('result')->default(99);
            $table->integer('fixture_id')->unsigned();
            $table->decimal('statHome', 2, 1)->nullable(); // % de casa
            $table->decimal('statVisitor', 2, 1)->nullable(); // % de visitante
            $table->decimal('statTie', 2, 1)->nullable(); // % de empate
            
            $table->timestamps();

            //Foreign Keys
            $table->foreign('home_team')->references('id')->on('teams')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('visitor_team')->references('id')->on('teams')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('fixture_id')->references('id')->on('fixtures')
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
