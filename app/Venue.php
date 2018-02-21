<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    public function unconfirmedshows()
    {
    	return $this->belongsToMany('App\Unconfirmedshow')->withTimestamps();
    }

}
