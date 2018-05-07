<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSoldierExemptionsDatesColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soldier_exemptions', function (Blueprint $table) {
            $table->string('start_from')->nullable()->change();
            $table->string('end_at')->nullable()->change();

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
            $table->string('start_from')->nullable(false)->change();
            $table->string('end_at')->nullable(false)->change();
        });
    }
}
