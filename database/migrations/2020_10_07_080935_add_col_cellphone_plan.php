<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColCellphonePlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cellphone_plan', function (Blueprint $table) {
            $table->string('call_text_type');
            $table->string('data_type');
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
            $table->dropColumn('call_text_type');
            $table->dropColumn('data_type');
        });
    }
}
