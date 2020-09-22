<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealestateOption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realestate_option', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('pet');
            $table->string('internet');
            $table->string('snow_removal');
            $table->string('laundry');
            $table->string('dryer');
            $table->string('heation');
            $table->string('cooling');
            $table->string('refrigerator');
            $table->string('dishwasher');
            $table->string('oven');
            $table->string('full_fumiture');
            $table->string('Amenities');
            $table->string('transit_friendly');
            $table->string('storage');
            $table->string('elevator');
            $table->string('other');
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
        Schema::dropIfExists('realestate_option');
    }
}
