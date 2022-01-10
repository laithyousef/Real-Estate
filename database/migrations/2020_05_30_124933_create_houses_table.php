<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->decimal('space');
            $table->unsignedBigInteger('price');
            $table->string('direction');
            $table->string('floor_no');
            $table->smallInteger('rooms_no');
            $table->decimal('lat')->nullable();
            $table->decimal('long')->nullable();
            $table->boolean('available')->default(1);
            $table->foreignId('place_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('owner_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('houses');
    }
}
