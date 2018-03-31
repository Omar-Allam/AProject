<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldierIdentitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldier_identities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('form_id');
            $table->string('first_name');
            $table->string('father_name')->nullable();
            $table->string('grandfather_name')->nullable();
            $table->string('family_name')->nullable();
            $table->integer('rank_id')->default(0);
            $table->integer('general_number')->unique();
            $table->integer('power_id')->default(0);
            $table->string('unit')->nullable();
            $table->integer('region_id')->default(0);
            $table->date('hiring_date')->nullable();
            $table->integer('decision_number')->default(0);
            $table->date('decision_date')->nullable();
            $table->string('decision_side')->nullable();
            $table->string('specialization')->nullable();
            $table->string('weapon')->nullable();
            $table->date('enroll_date')->nullable();
            $table->date('promotion_date')->nullable();
            $table->string('installed_job')->nullable();
            $table->string('worked_job')->nullable();
            $table->integer('id_number')->unique();
            $table->string('id_source')->nullable();
            $table->date('id_date')->nullable();
            $table->string('graduate_side')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('external_city')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_origin')->nullable();
            $table->integer('social_status')->nullable();
            $table->string('current_address')->nullable();
            $table->integer('home_phone')->nullable();
            $table->integer('mobile_phone')->nullable();
            $table->integer('medical_status')->nullable();
            $table->integer('blood_type')->nullable();
            $table->text('seniority_promotions')->nullable();
            $table->text('decorations_medals')->nullable();
            $table->text('army_decision')->nullable();
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
        Schema::dropIfExists('soldier_identities');
    }
}
