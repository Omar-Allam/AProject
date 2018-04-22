<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSickLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sick_leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('soldier_id');
            $table->date('leave_from')->nullable();
            $table->date('leave_to')->nullable();
            $table->date('direct_date')->nullable();
            $table->string('reason')->nullable();
            $table->string('prev_balance')->nullable();
            $table->integer('period_of_vacation')->nullable();
            $table->string('side_of_acceptance')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('sick_leaves');
    }
}
