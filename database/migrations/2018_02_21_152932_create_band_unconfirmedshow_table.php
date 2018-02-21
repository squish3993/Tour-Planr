<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandUnconfirmedshowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('band_unconfirmedshow', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('unconfirmedshow_id')->unsigned();
            $table->integer('band_id')->unsigned();

            # Make foreign keys
            $table->foreign('unconfirmedshow_id')->references('id')->on('unconfirmedshows');
            $table->foreign('band_id')->references('id')->on('bands');
            });
    }
        
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('band_unconfirmedshow');
    }
}
