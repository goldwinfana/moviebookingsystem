<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id('movie_id')->autoIncrement();
            $table->string('title');
            $table->string('description');
            $table->string('image');
            $table->timestamps();
        });

        // Insert Movies
        DB::table('movies')->insert(
            array([
                'title' => '21 Bridges (2020)',
                'description'=>'Test',
                'image'=>'movies/21-bridges.jpg'
            ],
            [
                'title' => 'Bloodshot',
                'description'=>'Test',
                'image'=>'movies/bloodshot.jpeg'
            ],
            [
                'title' => 'Avengers',
                'description'=>'Test',
                'image'=>'movies/end-game.jpg'
            ],
            [
                'title' => 'Fantastic Beasts',
                'description'=>'Test',
                'image'=>'movies/fantastics.jpg'
            ],
            [
                'title' => 'The Irishman',
                'description'=>'Test',
                'image'=>'movies/the-irishman.jpg'
            ],
            [
                'title' => 'Captain America',
                'description'=>'Test',
                'image'=>'movies/captain-america.jpg'
            ],
            [
                'title' => 'Papillon',
                'description'=>'Test',
                'image'=>'movies/papillon.jpg'
            ],
            [
                'title' => 'Peppermint',
                'description'=>'Test',
                'image'=>'movies/peppermint.jpg'
            ],
            [
                'title' => 'My Spy',
                'description'=>'Test',
                'image'=>'movies/my-spy.jpg'
            ],
            [
                'title' => 'Chronicle',
                'description'=>'Test',
                'image'=>'movies/chronicle.jpg'
            ],
            [
                'title' => 'Dark Tower',
                'description'=>'Test',
                'image'=>'movies/dark-tower.jpg'
            ],
            [
                'title' => 'Creed',
                'description'=>'Test',
                'image'=>'movies/creed.jpg'
            ],
            [
                'title' => '12 Strong',
                'description'=>'Test',
                'image'=>'movies/12-strong.jpg'
            ])
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
