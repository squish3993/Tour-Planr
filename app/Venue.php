<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    public function unconfirmedshows()
    {
    	return $this->belongsToMany('App\Unconfirmedshow')->withTimestamps();
    }

    public function confirmedshows()
    {
    	return $this->belongsToMany('App\Confirmedshow')->withTimestamps();
    }

}
