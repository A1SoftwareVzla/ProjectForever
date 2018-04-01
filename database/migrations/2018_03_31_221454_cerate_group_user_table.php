<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CerateGroupUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_user', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_group')->unsigned();
            $table->integer('id_user')->unsigned();
            $table->integer('score')->unsigned();
            $table->enum('administrador', ['SI', 'NO']);

            $table->timestamps();

            //Foreign Keys
            $table->foreign('id_group')->references('id')->on('groups')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_user')->references('id')->on('users')
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
