<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldierAnnualReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldier_annual_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('soldier_id');
            $table->integer('form_id');
            $table->string('year');
            $table->text('personal_adj');
            $table->string('performance')->nullable();
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
        Schema::dropIfExists('soldier_annual_reports');
    }
}
