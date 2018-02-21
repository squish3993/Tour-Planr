<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UnconfirmedshowsTableSeeder::class);
        $this->call(ConfirmedshowsTableSeeder::class);
        $this->call(VenuesTableSeeder::class);
        $this->call(BandsTableSeeder::class);
        $this->call(UnconfirmedshowVenueTableSeeder::class);
        $this->call(BandUnconfirmedshowTableSeeder::class);
    }
}
