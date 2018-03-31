<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldierCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldier_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('form_id');
            $table->integer('soldier_id');
            $table->string('course_name')->nullable();
            $table->string('course_time_frame')->nullable();
            $table->string('course_place')->nullable();
            $table->date('graduation_date')->nullable();
            $table->string('course_grade')->nullable();
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
        Schema::dropIfExists('soldier_courses');
    }
}
