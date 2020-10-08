<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCellphonePlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cellphone_plan', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('public');
            $table->string('subject');
            $table->string('call_text');
            $table->string('data');
            $table->string('features');
            $table->string('add_one');
            $table->string('processing_fee');
            $table->string('price');
            $table->string('total_price');
            
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
        Schema::dropIfExists('cellphone_plan');
    }
}
