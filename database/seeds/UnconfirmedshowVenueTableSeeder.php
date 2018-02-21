<?php

use Illuminate\Database\Seeder;
use App\Unconfirmedshow;
use App\Venue;

class UnconfirmedshowVenueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unconfirmedshows =[
        'New York' => ['Bowery Electric', 'Arlenes Grocery'],
        'Chicago' => ['The Hideout']
    	];

    # Now loop through the above array, creating a new pivot for each book to tag
    foreach ($unconfirmedshows as $city => $venues) {

        # First get the book
        $unconfirmedshow = Unconfirmedshow::where('city', 'like', $city)->first();

        # Now loop through each tag for this book, adding the pivot
        foreach ($venues as $name) {
            $venue = Venue::where('name', 'LIKE', $name)->first();

            # Connect this tag to this book
            $unconfirmedshow->venues()->save($venue);
        }
    }
    }
}
