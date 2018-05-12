<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMartydomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('martydoms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('soldier_id')->nullable();
            $table->string('martyrdom_date')->nullable();
            $table->string('injury_type')->nullable();
            $table->string('martyrdom_place')->nullable();
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
        Schema::dropIfExists('martydoms');
    }
}
