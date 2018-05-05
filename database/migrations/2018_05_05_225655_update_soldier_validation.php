<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSoldierValidation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soldier_identities', function (Blueprint $table) {
            $table->integer('decision_number')->nullable()->change();
            $table->date('decision_date')->nullable()->change();
            $table->date('enroll_date')->nullable()->change();
            $table->date('promotion_date')->nullable()->change();
            $table->date('hiring_date')->nullable()->change();
            $table->string('decision_side')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soldier_identities', function (Blueprint $table) {
            //
        });
    }
}
