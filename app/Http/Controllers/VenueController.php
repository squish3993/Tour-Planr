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

    public function delete($id)
    {
        $venue = Venue::find($id);
        if (!$venue) 
        {
            return redirect('/venues')->with('alert', 'Venue not found');
        }

        return view('venues.deletevenue')->with([
            'venue' => $venue
        ]);
    }

    public function destroy($id)
    {
        $venue = Venue::find($id);

        if (!$venue) 
        {
            return redirect('/venues')->with('alert', 'Venue not found');
        }

        $venue->unconfirmedshows()->detach();
        $venue->confirmedshows()->detach();
        $venue->delete();

        return redirect('/venues')->with('alert', 'The venue '.$venue->name.' was removed.');
    }

    public function edit($id)
    {
        $venue = Venue::find($id);

        if (!$venue) {
            return redirect('/')->with('alert', 'Venue not found');
        }

        return view('venues.editvenue')->with([
            'venue' => $venue
        ]);
    }

    public function update(Request $request, $id)
    {
        $venue = Venue::find($id);
   
        $venue->name = $request->input('name');
        $venue->city = $request->input('city');
    	$venue->address = $request->input('address');
    	$venue->capacity = $request->input('capacity');
    	$venue->booking = $request->input('booking');
        $venue->save();

        return redirect('/venues')->with('alert', 'Your changes were saved!');
    }
}
