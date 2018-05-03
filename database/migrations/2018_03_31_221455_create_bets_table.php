<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bets', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('forecast_id')->unsigned();
            $table->integer('match_id')->unsigned();
            $table->integer('forecast');
            $table->integer('status')->default(99); 
            // 99 - aun no se evalua el resultado, 
            // 11 - acertó ambos resultados, 
            // 12 - acertó el equipo ganador pero no la diferenciade goles
            // 21 - acertó la diferencia de goles, mas no el equipo ganador
            // 22 - no acertó ningun resultado
            // este campo es para colocar el check o la x al lado de los pronosticos

            $table->timestamps();

            //Foreign Keys
            $table->foreign('match_id')->references('id')->on('matches')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('forecast_id')->references('id')->on('forecasts')
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
        Schema::dropIfExists('bets');
    }
}
