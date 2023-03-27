<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_slots', function (Blueprint $table) {
            $table->id('slot_id')->autoIncrement();
            $table->integer('movie_id');
            $table->dateTime('slot_datetime');
            $table->timestamps();
        });

        DB::table('movie_slots')->insert(
            array(['movie_id'=>1,'slot_datetime'=>new DateTime('26-03-2023 12:00:00') ],
                ['movie_id'=>1,'slot_datetime'=>new DateTime('26-03-2023 20:00:00')],
                ['movie_id'=>2,'slot_datetime'=>new DateTime('26-03-2023 12:00:00')],
                ['movie_id'=>2,'slot_datetime'=>new DateTime('26-03-2023 20:00:00')]
            ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_slots');
    }
}
