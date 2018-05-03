<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForecastGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forecast_group', function (Blueprint $table) {
            $table->increments('id');
           
            $table->integer('forecast_id')->unsigned();
            $table->integer('group_id')->unsigned();

            $table->timestamps();
            
            //Foreign Keys
            $table->foreign('forecast_id')->references('id')->on('forecasts')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('group_id')->references('id')->on('groups')
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
