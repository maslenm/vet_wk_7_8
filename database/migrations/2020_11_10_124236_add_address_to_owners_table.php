<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressToOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   // target the owners table
        // define the change(addition of address columns)
        Schema::table('owners', function (Blueprint $table) {
            // add new column
            $table->string('address_1', 100)->default('');
            $table->string('address_2', 100)->nullable();
            $table->string('town', 100)->default('');
            $table->string('postcode', 100)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // target the owners table
        Schema::table('owners', function (Blueprint $table) {
            // remove the new column
            $table->dropColumn('address_1');
            $table->dropColumn('address_2');
            $table->dropColumn('town');
            $table->dropColumn('postcode');
        });
    }
}
