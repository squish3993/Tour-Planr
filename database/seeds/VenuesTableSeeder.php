<?php

use Illuminate\Database\Seeder;
use App\Venue;

class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $venues = [
         	['Obriens Pub', 'Boston', '3 Harvard Ave, Allston, MA 02134', NULL, NULL],
         	['Bowery Electric', 'New York', '327 Bowery, New York, NY 10003', 200, 'https://www.theboweryelectric.com/booking/'],
         	['Arlenes Grocery', 'New York', '95 Stanton St, New York, NY 10002', 150, 'https://www.arlenesgrocery.net/booking/'],
         	['The Hideout', 'Chicago', '1354 W Wabansia Ave, Chicago, IL 60642', 100, 'https://www.hideoutchicago.com/booking/']  	
         ];

         $count = count($venues);

         foreach ($venues as $key => $venue) 
         {
            Venue::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $venue[0],
                'city' => $venue[1],
                'address' => $venue[2],
                'capacity' => $venue[3],
                'booking' => $venue[4]
            ]);
            $count--;
         }  
    }
}
