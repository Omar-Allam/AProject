<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::create('formation_soldiers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formation_id');
            $table->integer('soldier_id')->nullable();
            $table->integer('private_number');
            $table->string('job_description')->nullable();
            $table->integer('current_rate')->nullable();
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
        Schema::dropIfExists('formations');
        Schema::dropIfExists('formation_soldiers');
    }
}
