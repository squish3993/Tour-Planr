<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBandConfirmedshowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('band_confirmedshow', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('confirmedshow_id')->unsigned();
            $table->integer('band_id')->unsigned();

            # Make foreign keys
            $table->foreign('confirmedshow_id')->references('id')->on('confirmedshows');
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
        Schema::dropIfExists('band_confirmedshow');
    }
}
