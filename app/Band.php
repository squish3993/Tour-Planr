<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    public function unconfirmedshows()
    {
    	return $this->belongsToMany('App\Unconfirmedshow')->withTimestamps();
    }
}
