<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('make_id');
            $table->unsignedInteger('model_detail_id');
            $table->string('car_model', 100);
            $table->timestamps();

            $table->foreign('make_id')->references('id')->on('makes');
            $table->foreign('model_detail_id')->references('id')->on('model_details');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_models');
    }
}
