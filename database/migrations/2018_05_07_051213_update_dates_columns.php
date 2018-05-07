<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDatesColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sick_leaves', function (Blueprint $table) {
            $table->string('leave_from')->nullable()->change();
            $table->string('leave_to')->nullable()->change();
            $table->string('direct_date')->nullable()->change();
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
            $table->string('leave_from')->nullable(false)->change();
            $table->string('leave_to')->nullable(false)->change();
            $table->string('direct_date')->nullable(false)->change();
        });
    }
}
