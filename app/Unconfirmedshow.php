<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unconfirmedshow extends Model
{
    public function venues()
    {
    	return $this->belongsToMany('App\Venue')->withTimestamps();
    }
}
