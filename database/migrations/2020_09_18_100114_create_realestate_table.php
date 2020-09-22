<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealestateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realestate', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('public');
            $table->string('transaction');
            $table->string('street_number');
            $table->string('street_name');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('postal_code');
            $table->string('price');
            $table->string('price_type');
            $table->string('subject');
            $table->string('description');
            $table->string('view');
            $table->string('move_in_date');
            $table->string('dealer_id');
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
        Schema::dropIfExists('realestate');
    }
}
