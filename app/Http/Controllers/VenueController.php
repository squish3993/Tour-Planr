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

    public function create()
    {
        return view('venues.createvenue');      
    }

    public function store(Request $request)
    {
        
        /*$this->validate($request, [
            'city' => 'required',
            'date' => 'required',
            'tier' => 'required|integer'
        ]); */

        $venue = new Venue();

  

        $venue->name = $request->input('name');
    	$venue->city = $request->input('city');
    	$venue->address = $request->input('address');
    	$venue->capacity = $request->input('capacity');
    	$venue->booking = $request->input('booking');
        $venue->save();
        return redirect('/venues');
    }
}
