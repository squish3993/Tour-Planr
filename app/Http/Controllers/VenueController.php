<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unconfirmedshow;
use App\Confirmedshow;
use App\Venue;
use App\Band;

class VenueController extends Controller
{
    public function show(Request $request)
    {
    	$venues = Venue::orderBy('city')->get();

    	return view('venues.showvenues')->with([
    		'venues'=> $venues
    	]);
    }
}
