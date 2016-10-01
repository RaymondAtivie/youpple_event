<?php

Route::group([
    'prefix'=>'events'
], function(){
    Route::auth();

    Route::get("/email", function(){
        return view('emails.signup');
    });

    $s = 'social.';
    Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\AuthController@getSocialRedirect']);
    Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\AuthController@getSocialHandle']);

    Route::get("/register/more", "Auth\AuthController@moreReg");
    Route::post("/register/more", "Auth\AuthController@saveUserInfo");

    Route::get('/', 'EventsController@home');
    Route::get('/list', 'EventsController@listEvents');
    Route::get('/list/{category}', 'EventsController@listEventsByCategory');
    Route::get('/services/{category}', 'EventsController@listServicesByCategory');

    Route::get('/view/service/{user}', 'EventsController@viewService');

    Route::get('myorders', 'ServiceController@showServiceOrders');
    Route::get('myorders/others', 'ServiceController@showServiceOrdersToOthers');
    Route::get("myorders/me", 'ServiceController@showServiceOrdersToMe');
    Route::get("myorders/paid", 'ServiceController@showPaidOrders');

    Route::get("myorders/paid/{payment}/confirm", 'ServiceController@confirmPaidOrders');
    Route::post("myorders/paid/{payment}/complain", 'ServiceController@complainPaidOrders');

    Route::post('/myorders/{order}/counter', 'ServiceController@counterOffer');
    Route::any('/myorders/{order}/cancel', 'ServiceController@cancelOffer');
    Route::post('/myorders/{order}/pay', 'ServiceController@payOrder');
    Route::any('/myorders/{order}/confirmpay', 'ServiceController@confirmPay');

    Route::post('/list/orders/{order}/counter', "ServiceController@counterOffer");
    Route::get('/list/orders/{order}/cancel', "ServiceController@cancelOffer");
    Route::get('/list/orders/{order}/decline', "ServiceController@declineOffer");
    Route::get('/list/orders/{order}/accept', "ServiceController@acceptOffer");

    Route::get('/becomeProvider', 'EventsController@becomeProvider');
    Route::get('/me', 'EventsController@viewProfile');

    Route::get('/myprofile', 'EventsController@showUserProfile');
    Route::any('/myprofile/uploadDP', 'EventsController@updateDP');
    Route::post('/myprofile/uploadExtraPics', 'EventsController@updateExtraPics');
    Route::any('/myprofile/updateBio', 'EventsController@updateBio');

    Route::get('/myevent', 'EventsController@showUserEvents');
    Route::get('/myevent/{event}/tickets', 'EventsController@showUserEventTickets');
    Route::get('/myevent/{event}/remove', 'EventsController@removeEvent');
    Route::get('/myevent/ticket/revoke/{ticket}', 'EventsController@revokeTicket');
    Route::get('/myevent/ticket/unrevoke/{ticket}', 'EventsController@unrevokeTicket');

    Route::any('/apply', 'TicketController@regEvent');
    Route::get('/ticket/show/{ticket}', 'TicketController@showTicket');
    Route::post('/ticket/save', 'TicketController@saveTicket');

    Route::get('/order', 'ServiceController@orderService')->middleware('auth');
    Route::post('/order', 'ServiceController@createOrder')->middleware('auth');

    Route::get('/create', 'EventsController@showCreate');
    Route::post('/create', 'EventsController@store');
    Route::group([
        'middleware'=>['confirmEvent']
    ], function(){
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

    Route::get('/{event}', 'EventsController@show');
});

?>
