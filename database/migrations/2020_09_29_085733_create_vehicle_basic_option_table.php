<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleBasicOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_basic_option', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('power_handle');
            $table->string('power_window');
            $table->string('air_conditioner');
            $table->string('full_auto_air_conditioner');
            $table->string('tinting');
            $table->string('sunroof');
            $table->string('panorama_sunroof');
            $table->string('aluminium_wheel');
            $table->string('ecm_room_mirror');
            $table->string('woodgrain');
            $table->string('metalgrain');
            $table->string('remote_starting_device');
            $table->string('smart_key');
            $table->string('leather_seat');
            $table->string('electric_sheet');
            $table->string('memory_sheet');
            $table->string('heated_sheet');
            $table->string('gout_sheet');
            $table->string('black_box');
            $table->string('high_pass');
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
        Schema::dropIfExists('vehicle_image');
    }
}
