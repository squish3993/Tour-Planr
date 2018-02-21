<?php

use Illuminate\Database\Seeder;
use App\Unconfirmedshow;
use App\Band;

class BandUnconfirmedshowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	{
	    
        $unconfirmedshows =
        [
	        'New York' => ['More Tongues Than Teeth', 'ALL CAPS LADD'],
	        'Philadelphia' => ['Cayetana'],
	        'Amherst' => ['Old Flame']
    	];

	    # Now loop through the above array, creating a new pivot for each book to tag
	    foreach ($unconfirmedshows as $city => $bands) {

	        # First get the book
	        $unconfirmedshow = Unconfirmedshow::where('city', 'like', $city)->first();

	        # Now loop through each tag for this book, adding the pivot
	        foreach ($bands as $name) {
	            $band = Band::where('name', 'LIKE', $name)->first();

	            # Connect this tag to this book
	            $unconfirmedshow->bands()->save($band);
	        }
    }
    }
}
