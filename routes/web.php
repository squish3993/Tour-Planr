<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'UnconfirmedshowController@index');

#Add an Unconfirmed Show
Route::get('/ucshow/create', 'UnconfirmedshowController@create');
Route::post('/', 'UnconfirmedshowController@store');

# Delete an Unconfirmedshow
Route::get('/ucshow/{id}/delete', 'UnconfirmedshowController@delete');
Route::delete('/ucshow/{id}', 'UnconfirmedshowController@destroy');

#Edit an unconfirmed show
Route::get('/ucshow/{id}/edit', 'UnconfirmedshowController@edit');
Route::put('/ucshow/{id}', 'UnconfirmedshowController@update');

#vView a Show
Route::get('/ucshow/{id}/view', 'UnconfirmedshowController@view');

#View all Venues
Route::get('/venues', 'VenueController@show');

#Create a Venue
Route::get('/venues/create', 'VenueController@create');
Route::post('/venues', 'VenueController@store');

#Delete a Venue
Route::get('venues/{id}/delete', 'VenueController@delete');
Route::delete('venues/{id}', 'VenueController@destroy');

#Edit a Venue
Route::get('/venues/{id}/edit', 'VenueController@edit');
Route::put('venues/{id}', 'VenueController@update');













#------------------------------------------------------------------------------

Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});