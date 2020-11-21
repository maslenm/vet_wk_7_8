<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTelColLengthTo14 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // target the owners table
        Schema::table('owners', function (Blueprint $table) {
            //define the change(change max length of tel number to 14)
            $table->string("telephone", 14)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('owners', function (Blueprint $table) {
            //
            $table->string("telephone", 11)->change();
        });
    }
}
