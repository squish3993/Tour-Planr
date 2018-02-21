<?php

use Illuminate\Database\Seeder;
use App\Confirmedshow;
use App\Venue;

class ConfirmedshowVenueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $confirmedshows =[
        '2018-08-17' => ['Obriens Pub']
    	];

	    # Now loop through the above array, creating a new pivot for each book to tag
	    foreach ($confirmedshows as $date => $venues) {

        	# First get the book
        	$confirmedshow = Confirmedshow::where('date', 'like', $date)->first();

        	# Now loop through each tag for this book, adding the pivot
        	foreach ($venues as $name) {
            	$venue = Venue::where('name', 'LIKE', $name)->first();

            # Connect this tag to this book
            	$confirmedshow->venues()->save($venue);
        	}
    	}
    }    
}
