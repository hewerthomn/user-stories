<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScenariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenarios', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('given');
            $table->text('when');
            $table->text('then');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('story_id')->unsigned()->index();
            $table->foreign('story_id')->references('id')->on('stories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scenarios');
    }
}
