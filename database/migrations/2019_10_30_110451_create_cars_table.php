<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('model_id');
            $table->unsignedBigInteger('car_feature_id');
            $table->text('description_title');
            $table->text('description_content');
            $table->smallInteger('year_of_reg');
            $table->mediumInteger('mileage');
            $table->decimal('yearly_road_tax', 10, 2);
            $table->char('registration', 7);
            $table->string('image')->default("");
            $table->decimal('price', 12, 2);
            $table->timestamps();

            $table->foreign('model_id')->references('id')->on('car_models');
            $table->foreign('car_feature_id')->references('id')->on('car_features');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
