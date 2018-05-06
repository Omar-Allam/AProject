<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateValidations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soldier_relatives', function (Blueprint $table) {
            $table->integer('form_id')->nullable()->change();
            $table->integer('relative_type')->nullable()->change();
            $table->string('relative_name')->nullable()->change();
            $table->string('current_nationality')->nullable()->change();
            $table->string('original_nationality')->nullable()->change();
            $table->string('relative_place_of_origin')->nullable()->change();
            $table->string('relative_place_of_birth')->nullable()->change();
            $table->string('relative_date_of_birth')->nullable()->change();
        });

        Schema::table('soldier_sons', function (Blueprint $table) {
            $table->integer('form_id')->nullable()->change();
            $table->string('soldier_son_name')->nullable()->change();
            $table->date('soldier_son_date_of_birth')->nullable()->change();
        });

        Schema::table('soldier_vacations', function (Blueprint $table) {
            $table->integer('form_id')->nullable()->change();
            $table->string('vacation_type')->nullable()->change();
            $table->string('vacation_period')->nullable()->change();
            $table->string('vacation_place')->nullable()->change();
            $table->date('vacation_end_date')->nullable()->change();
        });

        Schema::table('soldier_qualifications', function (Blueprint $table) {
            $table->integer('form_id')->nullable()->change();
            $table->string('soldier_level')->nullable()->change();
            $table->string('soldier_specialization')->nullable()->change();
            $table->string('soldier_educational_place_name')->nullable()->change();
            $table->string('soldier_educational_place')->nullable()->change();
            $table->date('soldier_graduation_date')->nullable()->change();
        });

        Schema::table('soldier_jobs', function (Blueprint $table) {
            $table->integer('form_id')->nullable()->change();
            $table->string('job_name')->nullable()->change();
            $table->string('soldier_job_unit')->nullable()->change();
            $table->date('consider_from')->nullable()->change();
        });


        Schema::table('soldier_exemptions', function (Blueprint $table) {
            $table->string('reason')->nullable()->change();
            $table->date('start_from')->nullable()->change();
            $table->date('end_at')->nullable()->change();
            $table->text('tasks')->nullable()->change();
            $table->string('prev_balance')->nullable()->change();
            $table->string('side_of_acceptance')->nullable()->change();
            $table->string('notes')->nullable()->change();
            $table->string('exemption_period')->nullable()->change();
        });

        Schema::table('soldier_courses', function (Blueprint $table) {
            $table->integer('form_id')->nullable()->change();
            $table->string('course_name')->nullable()->change();
            $table->string('course_time_frame')->nullable()->change();
            $table->string('course_place')->nullable()->change();
            $table->date('graduation_date')->nullable()->change();
            $table->string('course_grade')->nullable()->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soldier_identities', function (Blueprint $table) {
            Schema::table('soldier_relatives', function (Blueprint $table) {
                $table->integer('form_id')->nullable(false)->change();
                $table->integer('relative_type')->nullable(false)->change();
                $table->string('relative_name')->nullable(false)->change();
                $table->string('current_nationality')->nullable(false)->change();
                $table->string('original_nationality')->nullable(false)->change();
                $table->string('relative_place_of_origin')->nullable(false)->change();
                $table->string('relative_place_of_birth')->nullable(false)->change();
                $table->string('relative_date_of_birth')->nullable(false)->change();
            });

            Schema::table('soldier_sons', function (Blueprint $table) {
                $table->integer('form_id')->nullable(false)->change();
                $table->string('soldier_son_name')->nullable(false)->change();
                $table->date('soldier_son_date_of_birth')->nullable(false)->change();
            });

            Schema::table('soldier_vacations', function (Blueprint $table) {
                $table->integer('form_id')->nullable(false)->change();
                $table->string('vacation_type')->nullable(false)->change();
                $table->string('vacation_period')->nullable(false)->change();
                $table->string('vacation_place')->nullable(false)->change();
                $table->date('vacation_end_date')->nullable(false)->change();
            });

            Schema::table('soldier_qualifications', function (Blueprint $table) {
                $table->integer('form_id')->nullable(false)->change();
                $table->string('soldier_level')->nullable(false)->change();
                $table->string('soldier_specialization')->nullable(false)->change();
                $table->string('soldier_educational_place_name')->nullable(false)->change();
                $table->date('soldier_educational_place')->nullable(false)->change();
                $table->date('soldier_graduation_date')->nullable(false)->change();
            });

            Schema::table('soldier_jobs', function (Blueprint $table) {
                $table->integer('form_id')->nullable(false)->change();
                $table->string('job_name')->nullable(false)->change();
                $table->string('soldier_job_unit')->nullable(false)->change();
                $table->date('consider_from')->nullable(false)->change();
            });


            Schema::table('soldier_exemptions', function (Blueprint $table) {
                $table->string('reason')->nullable(false)->change();
                $table->date('start_from')->nullable(false)->change();
                $table->date('end_at')->nullable(false)->change();
                $table->text('tasks')->nullable(false)->change();
                $table->string('prev_balance')->nullable(false)->change();
                $table->string('side_of_acceptance')->nullable(false)->change();
                $table->string('notes')->nullable(false)->change();
                $table->string('exemption_period')->nullable(false)->change();
            });

            Schema::table('soldier_courses', function (Blueprint $table) {
                $table->integer('form_id')->nullable(false)->change();
                $table->string('course_name')->nullable(false)->change();
                $table->string('course_time_frame')->nullable(false)->change();
                $table->string('course_place')->nullable(false)->change();
                $table->date('graduation_date')->nullable(false)->change();
                $table->string('course_grade')->nullable(false)->change();
            });
        });
    }
}
