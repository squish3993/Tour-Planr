<?php

use Illuminate\Database\Seeder;
use App\Confirmedshow;

class ConfirmedshowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $confirmedshows = [
         	['2018-08-17'] 	
         ];

         $count = count($confirmedshows);

         foreach ($confirmedshows as $key => $confirmedshow) 
         {
            Confirmedshow::insert([
                'created_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'updated_at' => Carbon\Carbon::now()->subDays($count)->toDateTimeString(),
                'date' => $confirmedshow[0],
            ]);
            $count--;
         }  
    }
}
