<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnconfirmedshowVenueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unconfirmedshow_venue', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            
            $table->integer('unconfirmedshow_id')->unsigned();
            $table->integer('venue_id')->unsigned();

            # Make foreign keys
            $table->foreign('unconfirmedshow_id')->references('id')->on('unconfirmedshows');
            $table->foreign('venue_id')->references('id')->on('venues');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unconfirmedshow_venue');
    }
}
