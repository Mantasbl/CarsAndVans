<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('fuel_type_id');
            $table->unsignedInteger('engine_id');
            $table->unsignedInteger('body_style_id');
            $table->string('colour', 150);
            $table->tinyInteger('number_of_doors');
            $table->smallInteger('height');
            $table->smallInteger('length');
            $table->smallInteger('wheelbase');
            $table->smallInteger('width');
            $table->tinyInteger('insurance_group');
            $table->timestamps();

            $table->foreign('fuel_type_id')->references('id')->on('fuel_types');
            $table->foreign('engine_id')->references('id')->on('engines');
            $table->foreign('body_style_id')->references('id')->on('body_styles');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model_details');
    }
}
