<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInjurySoldiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('injury_soldiers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('soldier_id')->nullable();
            $table->string('injury_date')->nullable();
            $table->string('injury_type')->nullable();
            $table->string('injury_place')->nullable();
            $table->string('return_date')->nullable();
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
        Schema::dropIfExists('injury_soldiers');
    }
}
