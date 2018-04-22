<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldierExemptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldier_exemptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('soldier_id');
            $table->string('reason')->nullable();
            $table->date('start_from');
            $table->date('end_at');
            $table->text('tasks')->nullable();
            $table->string('prev_balance')->nullable();
            $table->string('side_of_acceptance')->nullable();
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
        Schema::dropIfExists('soldier_exemptions');
    }
}
