<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldierSonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldier_sons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('form_id');
            $table->integer('soldier_id');
            $table->string('soldier_son_name')->nullable();
            $table->date('soldier_son_date_of_birth')->nullable();
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
        Schema::dropIfExists('soldier_sons');
    }
}
