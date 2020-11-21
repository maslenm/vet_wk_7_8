<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            // create the basic animals columns
            $table->id();
            $table->string("name", 100);
            $table->string("type", 100);
            $table->date('date_of_birth');
            $table->decimal('weight_kg',5,2);
            $table->decimal('height_m', 5,2);
            $table->enum('biteyness', [1, 2, 3, 4, 5]);
            $table->timestamps();
            // create the article_id column
            // add a foreign key constraint
            // setup cascading on delete
            // this tells MySQL that the article_id column 
            // references the id column on the articles table 
            // we also want MySQL to automatically remove any 
            // comments linked to articles that are deleted 
            $table->foreignId("owner_id")
                  ->constrained() 
                  ->onDelete("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
