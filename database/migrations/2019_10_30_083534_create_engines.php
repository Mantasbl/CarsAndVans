<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEngines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transmission_id');
            $table->tinyInteger('number_of_gears')->nullable();
            $table->smallInteger('engine_size');
            $table->smallInteger('co2_emission')->nullable();
            $table->decimal('fuel_consumption_u', 8, 2)->nullable();
            $table->decimal('fuel_consumption_eu', 8, 2)->nullable();
            $table->decimal('fuel_consumption_c', 8, 2)->nullable();
            $table->decimal('top_speed', 8, 1)->nullable();
            $table->decimal('0_to_60', 4, 1)->nullable();
            $table->smallInteger('engine_torque')->nullable();
            $table->smallInteger('engine_power')->nullable();
            $table->tinyInteger('cylingers')->nullable();
            $table->timestamps();

            $table->foreign('transmission_id')
            ->references('id')
            ->on('transmissions')
            ->onDelete('cascade');
        });
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('engines');
    }
}
