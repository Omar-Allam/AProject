<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSickLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sick_leaves', function (Blueprint $table) {
            $table->string('decision_number')->nullable();
            $table->string('decision_date')->nullable();
            $table->string('recommendation')->nullable();
            $table->string('level')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sick_leaves', function (Blueprint $table) {
            $table->dropColumn('decision_number');
            $table->dropColumn('decision_date');
            $table->dropColumn('recommendation');
            $table->dropColumn('level');
        });
    }
}
