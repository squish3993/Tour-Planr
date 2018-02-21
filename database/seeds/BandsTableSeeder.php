<?php

use Illuminate\Database\Seeder;
use App\Band;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bands = [
         	['Old Flame', 'Northampton', 'Indie Rock', 'https://www.oldflameofficial.com/', NULL , NULL],
         	['Pile', 'Boston', 'Rock', 'http://pilemusic.tumblr.com/', 15913, 'this is a cool band'],
         	['Stains of a Sunflower', 'Boston', 'Indie Rock', 'http://www.stainsofasunflower.com/', 1679, NULL],
         	['More Tongues than Teeth', 'New York', 'Rock', 'http://www.moretongues.com/', 158, 'Rob Dons Band'],
         	['ALL CAPS LADD', 'New York', 'Rock', 'https://allcapsladd.bandcamp.com/', 478, 'Jack Ladd'],
         	['Cayetana', 'Philadelphia', 'Indie Rock', 'http://www.cayetanaphilly.com/', 15780, NULL]  	
         ];

         $count = count($bands);

         foreach ($bands as $key => $band) 
         {
            Band::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'name' => $band[0],
                'city' => $band[1],
                'genre' => $band[2],
                'website' => $band[3],
                'likes' => $band[4],
                'other' => $band[5]
            ]);
            $count--;
         } 
	}
   
}
