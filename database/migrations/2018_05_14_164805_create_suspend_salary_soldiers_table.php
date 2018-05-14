<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuspendSalarySoldiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspend_salary_soldiers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('soldier_id')->nullable();
            $table->string('unit')->nullable();
            $table->string('suspend_reason')->nullable();
            $table->string('suspend_start')->nullable();
            $table->string('taken_action')->nullable();
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
        Schema::dropIfExists('suspend_salary_soldiers');
    }
}
