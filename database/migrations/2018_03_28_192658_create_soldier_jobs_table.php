<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldierJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldier_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('form_id');
            $table->integer('soldier_id');
            $table->string('job_name')->nullable();
            $table->string('soldier_job_unit')->nullable();
            $table->date('consider_from')->nullable();
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
        Schema::dropIfExists('soldier_jobs');
    }
}
