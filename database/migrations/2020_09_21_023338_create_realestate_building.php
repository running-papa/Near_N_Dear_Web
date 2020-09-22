<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealestateBuilding extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realestate_building', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('building_type');  //건물형태 아파트?
            $table->string('building_name');  // 건물이름
            $table->string('building_size');  // 건물크기
            $table->string('beds'); //방갯수
            $table->string('baths'); // 욕실
            $table->string('floor'); // 층
            $table->string('built_in'); // 지어진날짜
            $table->string('parking_spaces'); // 주차 몇대
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
        Schema::dropIfExists('realestate_building');
    }
}
