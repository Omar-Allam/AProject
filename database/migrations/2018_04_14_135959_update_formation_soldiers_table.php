<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateFormationSoldiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formation_soldiers', function (Blueprint $table) {
            $table->tinyInteger('is_participate')->default(0);
            $table->integer('is_a')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formation_soldiers', function (Blueprint $table) {
            $table->dropColumn('is_participate');
            $table->dropColumn('is_a');
        });
    }
}
