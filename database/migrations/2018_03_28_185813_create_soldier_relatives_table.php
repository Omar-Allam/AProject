<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldierRelativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldier_relatives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('form_id');
            $table->integer('soldier_id');
            $table->string('relative_name');
            $table->integer('relative_type')->default(0);
            $table->string('current_nationality')->nullable();
            $table->string('original_nationality')->nullable();
            $table->string('relative_place_of_origin')->nullable();
            $table->string('relative_place_of_birth')->nullable();
            $table->date('relative_date_of_birth')->nullable();
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
        Schema::dropIfExists('soldier_relatives');
    }
}
