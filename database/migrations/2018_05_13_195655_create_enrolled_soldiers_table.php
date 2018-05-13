<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrolledSoldiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrolled_soldiers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('soldier_id')->nullable();
            $table->string('main_unit')->nullable();
            $table->string('enroll_unit')->nullable();
            $table->string('enroll_start')->nullable();
            $table->string('enroll_end')->nullable();
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
        Schema::dropIfExists('enrolled_soldiers');
    }
}
