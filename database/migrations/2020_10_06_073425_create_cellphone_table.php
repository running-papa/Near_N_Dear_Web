<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCellphoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cellphone', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('public');
            $table->string('transaction');
            $table->string('maker');
            $table->string('device_name');
            $table->string('device_storage');
            $table->string('device_color');
            $table->string('item');
            $table->string('srp');
            $table->string('tier');
            $table->string('up_front_cost');
            $table->string('isc');
            $table->string('agreement_credit');
            $table->string('dro');
            $table->string('monthly_discount');
            $table->string('monthly_payment');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('image4');
            $table->string('image5');
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
        Schema::dropIfExists('cellphone');
    }
}
