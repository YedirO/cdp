<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// Tasks migration

class CreateTache extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tache', function (Blueprint $table) {

            $table->increments('id');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('code');
            $table->unique('code');
            $table->timestamps();
           // $table->foreign('us_story_id')->references('id')->on('us'); after

        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tache');
    }
}
