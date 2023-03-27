<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinema', function (Blueprint $table) {
            $table->id('cinema_id')->autoIncrement();
            $table->string('name');
            $table->string('location');
            $table->timestamps();
        });

        DB::table('cinema')->insert(
            array(['name'=>'Starland','location'=>'Pretoria Arcadia, Gauteng'],
                ['name'=>'Africa Cinema','location'=>'Midrand, Mall Of Africa, Gauteng'])
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cinema');
    }
}
