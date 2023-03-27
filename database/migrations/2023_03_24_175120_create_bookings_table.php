<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('booking_id')->autoIncrement();
            $table->integer('cinema_id');
            $table->integer('user_id');
            $table->integer('movie_id');
            $table->integer('no_of_tickets');
            $table->dateTime('slot');
            $table->timestamp('booking_time')->nullable();
            $table->string('ticket_no')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('bookings');
    }
}
