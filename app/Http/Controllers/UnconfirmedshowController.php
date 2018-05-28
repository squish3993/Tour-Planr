<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unconfirmedshow;
use App\Confirmedshow;
use App\Venue;
use App\Band;


class UnconfirmedshowController extends Controller
{
     public function index(Request $request)
    {
        $unconfirmedshows = Unconfirmedshow::orderBy('date')->get();
        $count = Unconfirmedshow::all()->count();
        $unconfirmedshow=[];
        $venues=[];

        //Fills array for shows
        for ($i = 1; $i <= $count; $i++)
        {
        	//$unconfirmedshow[($i-1)] = Unconfirmedshow::find($i);
            $unconfirmedshow[($i-1)] = $unconfirmedshows[($i-1)];
        }

		//Fills array for venues - Collection
		for ($i = 0; $i<$count; $i++)
    	{
    		$venues[$i] = $unconfirmedshow[$i]->venues;
        }	
        	
        //Counts how many venues are in each unconfirmed show for loop in view file
	    for ($i = 0; $i<$count; $i++)
	    {
	        	$countvenues[$i] = count($venues[$i]);
	    }

        
        return view('maps.unconfirmedshows')->with([
            'unconfirmedshows' => $unconfirmedshows,
            'venues' => $venues,
            'count' => $count,
            'countvenues' => $countvenues                      
        ]);
    }

     public function create()
    {
        return view('unconfirmedshows.createuc');      
    }

    public function store(Request $request)
    {
        
        /*$this->validate($request, [
            'city' => 'required',
            'date' => 'required',
            'tier' => 'required|integer'
        ]); */

        $show = new Unconfirmedshow();

        #Following code is used to convert Dropdown date and time input menu into readable dateTime format. 
        #dateTime doesn't need validation because the drop down menu prevents any malicious inputs
        $date = $request->input('year').'-'.$request->input('month').'-'.$request->input('day');

        $show->city = $request->input('city');
        $show->date = $date;
        $show->tier = $request->input('tier');
        $show->save();
        return redirect('/');
    }

    public function delete($id)
    {
        $show = Unconfirmedshow::find($id);
        if (!$show) 
        {
            return redirect('/')->with('alert', 'Show not found');
        }

        return view('unconfirmedshows.deleteuc')->with([
            'show' => $show
        ]);
    }

    public function destroy($id)
    {
        $show = Unconfirmedshow::find($id);

        if (!$show) 
        {
            return redirect('/')->with('alert', 'Show not found');
        }

        $show->venues()->detach();
        $show->bands()->detach();
        $show->delete();

        return redirect('/')->with('alert', 'Your show in '.$show->city.' was removed.');
    }

    public function edit($id)
    {
        $show = Unconfirmedshow::find($id);

        if (!$show) {
            return redirect('/')->with('alert', 'Show not found');
        }

        return view('unconfirmedshows.edituc')->with([
            'show' => $show
        ]);
    }

    public function update(Request $request, $id)
    {
        $show = Unconfirmedshow::find($id);
        $date = $request->input('year').'-'.$request->input('month').'-'.$request->input('day');

        $show->city = $request->input('city');
        $show->date = $date;
        $show->tier = $request->input('tier');
        $show->save();

        return redirect('/')->with('alert', 'Your changes were saved!');
    }

    public function view($id)
    {
        $show = Unconfirmedshow::find($id);
        $venues = Venue::orderBy('city')->get();

        if (!$show) {
            return redirect('/')->with('alert', 'Show not found');
        }

        return view('unconfirmedshows.viewuc')->with([
            'show' => $show,
            'venues' => $venues
        ]);
    }

     public function attach(Request $request, $id)
    {
        $show = Unconfirmedshow::with('venues')->find($id);
        $venue = $request->input('venue'); 
        
        $show->venues()->attach($venue);

        return redirect('/ucshow/'.$show->id.'/view')->with('alert', "The Venue was Added");      
    }

    public function detach($id, $id2)
    {
        $show = Unconfirmedshow::find($id);
        $venue = Venue::find($id2);

        $show->venues()->detach($venue->id);

        return redirect('/ucshow/'.$show->id.'/view')->with('alert', "The Venue was removed");
    }
}
