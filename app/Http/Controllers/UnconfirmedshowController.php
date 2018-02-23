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

        for ($i = 1; $i <= $count; $i++)
        {
        	$unconfirmedshow[($i-1)] = Unconfirmedshow::find($i);
        }
        //dump($unconfirmedshow);
		
		for ($i = 0; $i<$count; $i++)
	        	{
	        		$venues[$i] = $unconfirmedshow[$i]->venues;
	        		
	        		//echo $venue->name;
	        	}		        	
        
	    for ($i = 0; $i<$count; $i++)
	    {
	        	$countvenues[$i] = count($venues[$i]);
	    }

	    //dump($countvenues);
        //dd($venues);

      
        
        return view('maps.unconfirmedshows')->with([
            'unconfirmedshows' => $unconfirmedshows,
            'venues' => $venues,
            'count' => $count,
            'countvenues' => $countvenues                      
        ]);
    }
}
