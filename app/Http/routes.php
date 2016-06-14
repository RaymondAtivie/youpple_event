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

Route::get('/', 'PagesController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'events'], function(){
    Route::auth();

    Route::get('/', 'EventsController@index');
    Route::get('/create', 'EventsController@showCreateEvent');
    Route::any('/create/package', 'EventsController@showCreateEventPackage');
    Route::any('/create/media', 'EventsController@showCreateEventMedia');
    Route::any('/create/awards', 'EventsController@showCreateEventAwards');
    Route::any('/create/sponsors', 'EventsController@showCreateEventSponsors');

    Route::get('/{event}', 'EventsController@showEvent');

});
