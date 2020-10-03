<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleSafetyOption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_safety_option', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('driver_air_bag');
            $table->string('passenger_air_bag');
            $table->string('side_air_bag');
            $table->string('curtain_air_bag');
            $table->string('abs');
            $table->string('ecs');
            $table->string('esp');
            $table->string('tcs');
            $table->string('forward_aft_detector');
            $table->string('rear_camera');
            $table->string('navigation');
            $table->string('air_purifier');
            $table->string('other');
            $table->string('dealer_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_safety_option');
    }
}
