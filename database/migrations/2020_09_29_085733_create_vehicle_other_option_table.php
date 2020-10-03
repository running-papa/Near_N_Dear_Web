<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleOtherOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_other_option', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('super_vision_board');
            $table->string('bucket_sheet');
            $table->string('air_dam');
            $table->string('bumpergard');
            $table->string('chrome_wheel');
            $table->string('four_wheel_drive');
            $table->string('rear_spoiler');
            $table->string('cruise_control');
            $table->string('loop_carrier');
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
        Schema::dropIfExists('vehicle_other_option');
    }
}
