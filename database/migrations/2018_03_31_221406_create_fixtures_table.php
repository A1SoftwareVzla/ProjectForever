<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('description', 250)->nullable();
            $table->integer('id_tournament')->unsigned();

            $table->timestamps();

            //Foreign Keys
            $table->foreign('id_tournament')->references('id')->on('tournaments')
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
        Schema::dropIfExists('fixtures');
    }
}