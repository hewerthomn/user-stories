<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScenarioDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenario_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('situation');
            $table->string('condition');
            $table->text('detail');
            $table->timestamps();

            $table->integer('scenario_id')->unsigned()->index();
            $table->foreign('scenario_id')->references('id')->on('scenarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scenario_details');
    }
}
