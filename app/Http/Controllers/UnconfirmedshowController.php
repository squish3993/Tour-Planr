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
        	$unconfirmedshow[($i-1)] = Unconfirmedshow::find($i);
        }
       

		//Fills array for venues - Collection
		for ($i = 0; $i<$count; $i++)
	        	{
	        		$venues[$i] = $unconfirmedshow[$i]->venues;
	        		
	        		//echo $venue->name;
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
}
