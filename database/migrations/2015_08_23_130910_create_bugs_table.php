<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bugs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uid');
            $table->string('title');
            $table->string('version')->nullable();
            $table->text('pre_conditions');
            $table->text('steps_to_reproduce');
            $table->text('description');
            $table->text('desired_situation');
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
        Schema::drop('bugs');
    }
}
