<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieChairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_chairs', function (Blueprint $table) {
            $table->id();
            $table->integer('room_id');
            $table->integer('location');
            $table->boolean('available')->default(true);
            $table->boolean('double_chair')->default(false);
            $table->double('coefficient',8,2);
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
        Schema::dropIfExists('movie_chairs');
    }
}
