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

    Route::get('/', 'EventsController@home');

    Route::get('/create', 'EventsController@showCreate');
    Route::post('/create', 'EventsController@store');

    Route::group(['middleware'=>['confirmEvent']], function(){

        Route::get('/create/package', 'EventsController@showCreatePackage');
        Route::post('/create/package', 'EventsController@storePackage');

        Route::get('/create/media', 'EventsController@showCreateMedia');
        Route::post('/create/media', 'EventsController@storeMedia');

        Route::get('/create/awards', 'EventsController@showCreateAwards');
        Route::post('/create/awards', 'EventsController@storeAwards');

        Route::get('/create/sponsors', 'EventsController@showCreateSponsors');
        Route::post('/create/sponsors', 'EventsController@storeSponsors');

        Route::get('preview', 'EventsController@showPreview');
        Route::get('publish', 'EventsController@publishEvent');

        Route::get('deleteEvent', function()
        {
            // var_dump(session('event'));
            session()->forget("event");
        });
    });
    Route::get('/{event}', 'EventsController@show');

});
