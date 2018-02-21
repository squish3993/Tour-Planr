<?php

use Illuminate\Database\Seeder;
use App\Confirmedshow;
use App\Band;

class BandConfirmedshowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $confirmedshows =
        [
	        '2018-08-17' => ['Old Flame'],
	        
    	];

	    # Now loop through the above array, creating a new pivot for each book to tag
	    foreach ($confirmedshows as $date => $bands) {

	        # First get the book
	        $confirmedshow = Confirmedshow::where('date', 'like', $date)->first();

	        # Now loop through each tag for this book, adding the pivot
	        foreach ($bands as $name) {
	            $band = Band::where('name', 'LIKE', $name)->first();

	            # Connect this tag to this book
	            $confirmedshow->bands()->save($band);
	        }
    	}
    }
}
