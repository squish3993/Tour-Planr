zz<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmedshow extends Model
{
    public function venues()
    {
    	return $this->belongsToMany('App\Venue')->withTimestamps();
    }

    public function bands()
    {
    	return $this->belongsToMany('App\Band')->withTimestamps();
    }
}
