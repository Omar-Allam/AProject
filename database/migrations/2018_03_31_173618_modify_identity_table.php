<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyIdentityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soldier_identities',function (Blueprint $table){
            $table->string('home_phone')->nullable()->change();
            $table->string('mobile_phone')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soldier_identities',function (Blueprint $table){
            $table->integer('home_phone')->nullable()->change();
            $table->integer('mobile_phone')->nullable()->change();
        });
    }
}
