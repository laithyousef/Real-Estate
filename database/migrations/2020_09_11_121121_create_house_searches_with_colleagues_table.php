<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseSearchesWithColleaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_searches_with_colleagues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('lowest_price')->nullable();
            $table->integer('highest_price')->nullable();
            $table->integer('place_id')->nullable();
            $table->integer('rooms_number')->nullable();
            $table->integer('colleagues_number');
            $table->integer('lowest_age')->nullable();
            $table->integer('highest_age')->nullable();
            $table->string('sex')->nullable();
            $table->boolean('are_students')->nullable();
            $table->integer('college_speciality_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_searches_with_colleagues');
    }
}
