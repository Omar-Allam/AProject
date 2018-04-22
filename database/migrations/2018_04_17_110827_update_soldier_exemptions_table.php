<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSoldierExemptionsTablee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soldier_exemptions', function (Blueprint $table) {
            $table->string('exemption_period')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soldier_exemptions', function (Blueprint $table) {
            $table->dropColumn('exemption_period');
        });
    }
}
