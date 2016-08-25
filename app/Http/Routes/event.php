<?php

Route::group([
    'prefix'=>'events'
], function(){
    Route::auth();
    Route::get("/register/more", "Auth\AuthController@moreReg");
    Route::post("/register/more", "Auth\AuthController@saveUserInfo");

    Route::get('/', 'EventsController@home');
    Route::get('/{event}', 'EventsController@show');

    Route::get('/create', 'EventsController@showCreate');
    Route::post('/create', 'EventsController@store');

    Route::any('/apply', 'TicketController@regEvent');
    Route::get('/ticket/show/{ticket}', 'TicketController@showTicket');
    Route::post('/ticket/save', 'TicketController@saveTicket');

    Route::group(['middleware'=>['confirmEvent']], function(){

        Route::get('/create/package', 'EventsController@showCreatePackage');
        Route::post('/create/package', 'EventsController@storePackage');

        Route::get('/create/awards', 'EventsController@showCreateAwards');
        Route::post('/create/awards', 'EventsController@storeAwards');

        Route::get('/create/sponsors', 'EventsController@showCreateSponsors');
        Route::post('/create/sponsors', 'EventsController@storeSponsors');

        Route::get('preview', 'EventsController@showPreview');
        Route::get('publish', 'EventsController@publishEvent');

        Route::get('deleteEvent', function()
        {
            session()->forget("event");
        });
    });

});

?>
