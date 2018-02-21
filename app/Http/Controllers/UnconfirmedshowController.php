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
        
        return view('maps.unconfirmedshows')->with([
            'unconfirmedshows' => $unconfirmedshows,                      
        ]);
    }
}
