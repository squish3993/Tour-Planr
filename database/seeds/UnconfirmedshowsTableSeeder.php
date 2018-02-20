<?php

use Illuminate\Database\Seeder;
use App\Unconfirmedshow;


class UnconfirmedshowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $unconfirmedshows = [
         	['New York', 1, '2018-08-18'],
         	['Philadelphia', 2, '2018-08-20'],
         	['Chicago', 1, '2018-08-24'],
         	['St. Louis', 1, '2018-08-25'],
         	['Washington D.C', 2, '2018-08-28'],
         	['Amherst', 3, '2018-08-30'],
         ];

         $count = count($unconfirmedshows);

         foreach ($unconfirmedshows as $key => $unconfirmedshow) 
         {
            Unconfirmedshow::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'city' => $unconfirmedshow[0],
                'tier' => $unconfirmedshow[1],
                'date' => $unconfirmedshow[2]
            ]);
            $count--;
         }  
    }
}
