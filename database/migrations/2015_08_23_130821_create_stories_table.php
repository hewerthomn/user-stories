<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid')->index();
            $table->text('title');
            $table->text('who');
            $table->text('what');
            $table->text('why');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('project_id')->unsigned()->index();
            $table->foreign('project_id')->references('id')->on('projects');

            $table->integer('status_id')->nullable()->unsigned()->index();
            $table->foreign('status_id')->references('id')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stories');
    }
}
