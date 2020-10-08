<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColCellphonePlanAdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cellphone_plan', function (Blueprint $table) {
            $table->string('description');
            $table->string('more');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cellphone_plan', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('more');
        });
    }
}
