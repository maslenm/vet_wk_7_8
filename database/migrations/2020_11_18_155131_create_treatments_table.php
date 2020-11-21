<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create the treatments table
        // it's a termlist so call the string column name
        // don't need timestamps - not very useful here
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100);
        });

        Schema::create('animal_treatment', function (Blueprint $table) {
            $table->id();

            // create the animal id column and foreign key
            $table->foreignId("animal_id")->constrained()->onDelete("cascade");

            // create the treatment id column and foreign key     
            $table->foreignId("treatment_id") ->constrained()->onDelete("cascade");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // remove the pivot table first
        // otherwise all the treatments foreign key contraints would fail 
        Schema::dropIfExists("animal_treatment");

        // then drop the treatments table
        Schema::dropIfExists('treatments');

        //As a general rule, if you’re creating multiple tables, you should always drop them in reverse order.
    }
}
