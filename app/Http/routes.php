<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Models\Contestant;

Route::get('/', 'PagesController@index');

Route::get('api/vote/{contestant}', function(Contestant $contestant){
    $contestant->increment('vote');
    $contestant->save();

    return $contestant;
});

// Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/about', 'PagesController@about');

Route::group(['prefix'=>'events'], function(){
    Route::auth();

    Route::get('/', 'EventsController@index');
    Route::get('/create', 'EventsController@showCreateEvent');
    Route::post('/create', 'EventsController@storeEvent');
    Route::get('/create/package', 'EventsController@showCreateEventPackage');
    Route::any('/create/media', 'EventsController@showCreateEventMedia');
    Route::any('/create/awards', 'EventsController@showCreateEventAwards');
    Route::any('/create/sponsors', 'EventsController@showCreateEventSponsors');

    Route::get('/{event}', 'EventsController@showEvent');

});
