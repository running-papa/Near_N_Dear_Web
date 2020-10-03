<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('public');
            $table->string('transaction');
            $table->string('maker');
            $table->string('series');
            $table->string('trim');
            $table->string('type');
            $table->string('year');
            $table->string('fuel');
            $table->string('price');
            $table->string('mileage');
            $table->string('accident_status');
            $table->string('number');
            $table->string('subject');
            $table->string('description');
            $table->string('view');
            $table->string('postal_code');
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
        Schema::dropIfExists('vehicle');
    }
}
