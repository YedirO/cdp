<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserStory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userstory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->integer('priority');
            $table->integer('difficulty');
            $table->integer('status');
            $table->integer('project_id');
            $table->timestamps();
        });

        DB::table('userstory')->insert(
            array(
                'description' => 'Ma première User Story',
                'priority' => 1,
                'difficulty' => 3,
                'status' => 0,
                'project_id' => 1
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('userstory');
    }
}
