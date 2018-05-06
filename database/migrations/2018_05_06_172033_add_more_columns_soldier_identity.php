<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreColumnsSoldierIdentity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soldier_identities', function (Blueprint $table) {
            $table->text('exeption_promotions')->nullable();
            $table->text('medals')->nullable();
            $table->text('issued_decisions')->nullable();
            $table->text('vacations_and_places')->nullable();
            $table->text('annual_year')->nullable();
            $table->text('annual_personal_adj')->nullable();
            $table->text('annual_performance')->nullable();
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
            $table->dropColumn('exeption_promotions');
            $table->dropColumn('medals');
            $table->dropColumn('issued_decisions');
            $table->dropColumn('vacations_and_places');
            $table->dropColumn('annual_year');
            $table->dropColumn('annual_personal_adj');
            $table->dropColumn('annual_performance');
        });
    }
}
