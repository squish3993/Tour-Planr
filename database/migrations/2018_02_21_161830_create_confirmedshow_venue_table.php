<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfirmedshowVenueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmedshow_venue', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('confirmedshow_id')->unsigned();
            $table->integer('venue_id')->unsigned();

            # Make foreign keys
            $table->foreign('confirmedshow_id')->references('id')->on('confirmedshows');
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
        Schema::dropIfExists('confirmedshow_venue');
    }
}
