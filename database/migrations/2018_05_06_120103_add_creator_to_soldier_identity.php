<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatorToSoldierIdentity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soldier_identities', function (Blueprint $table) {
            $table->string('created_by')->nullable();
            $table->string('last_update_by')->nullable();
            $table->dropColumn('form_id');
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
            $table->dropColumn('created_by');
            $table->dropColumn('last_update_by');
            $table->integer('form_id');
        });
    }
}
