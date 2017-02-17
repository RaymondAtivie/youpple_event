<?php
Route::group([
    'prefix' => 'admin',
    'middleware' => ['admin']
], function () {
    Route::get('/', 'AdminController@dashboard');
    Route::get('/forms', 'AdminController@forms');

    Route::get('/admin', 'AdminController@viewAdmins');
    Route::post('/admin/add', 'AdminController@addAdmins');
    Route::get('/admin/delete/{adminid}', 'AdminController@deleteAdmin');

    Route::get('/eventtypes', 'AdminController@eventtypes');
    Route::post('/eventtypes/add', 'AdminController@addEventtype');
    Route::get('/eventtypes/{evt}/hide', 'AdminController@hideIntrest');
    Route::get('/eventtypes/{evt}/show', 'AdminController@showIntrest');
    Route::post('/eventtypes/servicelistadd', 'AdminController@addServiceList');
    Route::post('/eventtypes/serviceadd', 'AdminController@addServiceOption');
    Route::get('/servicelist/{evt}/hide', 'AdminController@hideService');
    Route::get('/servicelist/{evt}/show', 'AdminController@showService');

    Route::get('/home/logo', "AdminController@showLogo");
    Route::post('/home/changeLogo/{logoname}', "AdminController@changeLogo");
    Route::post('/home/addLogoButton/{logoname}', "AdminController@addLogoButton");
    Route::get('/home/removeLogoButton/{bid}', "AdminController@removeLogoButton");

    Route::get('/home/social', "AdminController@showSocial");
    Route::post('/home/changeSocial', "AdminController@changeSocial");

    Route::get('/home/terms', "AdminController@showTermsAndConditions");
    Route::post('/home/changeTerms', "AdminController@changeTermsAndConditions");

    Route::get('/home/termsofuse', "AdminController@showTermsOfUse");
    Route::post('/home/changeTOU', "AdminController@changeTermsOfUse");

    Route::get('/home/advert', "AdminController@showAdvert");
    Route::post('/home/changeAd', "AdminController@changeAdvert");

    Route::get('/home/privacy', "AdminController@showPrivacyPolicy");
    Route::post('/home/changePP', "AdminController@changePrivacyPolicy");

    Route::get('/home/faq', "AdminController@showFaq");
    Route::post('/home/changeFaq', "AdminController@changeFaq");

    //////////////////////////////////////////////////////////////////////

    Route::get('/sendemail', "EmailController@showSendEmail");
    Route::post('/sendemail', "EmailController@sendEmail");

    Route::get('/sendsms', "EmailController@showSendSMS");
    Route::post('/sendsms', "EmailController@sendSMS");

    /////////////////ABOUT//////////////////////////////////////////////
    Route::post('/about/changeTagline', "AdminController@changeTagline");

    Route::get('/about/info', "AdminController@showInfo");
    Route::post('/about/changeAboutInfo', "AdminController@changeInfo");
    Route::post('/about/changeAboutImage', "AdminController@changeInfoImage");
    Route::post('/about/changeAboutLogo/{logoname}', "AdminController@changeInfoLogo");

    Route::get('/about/clients', "AdminController@showClients");
    Route::post('/about/clients', "AdminController@saveClient");
    Route::get('/about/clients/remove/{clientId}', "AdminController@removeClient");

    Route::get('/about/team', "AdminController@showTeam");
    Route::post('/about/team', "AdminController@saveTeam");
    Route::get('/about/team/remove/{teamId}', "AdminController@removeTeam");

    Route::get('/about/partners', "AdminController@showPartners");
    Route::post('/about/partners', "AdminController@savePartner");
    Route::get('/about/partners/remove/{partnerId}', "AdminController@removePartner");

    Route::get('/about/testimonials', "AdminController@showTestimonials");
    Route::post('/about/testimonials', "AdminController@saveTestimony");
    Route::get('/about/testimonials/remove/{testimonyId}', "AdminController@removeTestimony");

    Route::get('/feature/events', "AdminController@showFeaturedEvents");
    Route::get('/feature/events/add/{event}', "AdminController@addToFeaturedEvent");
    Route::get('/feature/events/remove/{event}', "AdminController@removeFromFeaturedEvent");

    Route::get('/feature/providers', "AdminController@showFeaturedProviders");
    Route::get('/feature/providers/add/{user}', "AdminController@addToFeaturedProvider");
    Route::get('/feature/providers/remove/{user}', "AdminController@removeFromFeaturedProvider");

    Route::get('/list/customers', "AdminController@listCustomers");
    Route::get('/list/customers/remove/{user}', "AdminController@removeCustomer");

    Route::get('/list/orders', "AdminController@listOrders");
    Route::post('/list/orders/{order}/counter', "ServiceController@counterOffer");
    Route::get('/list/orders/{order}/cancel', "ServiceController@cancelOffer");
    Route::get('/list/orders/{order}/decline', "ServiceController@declineOffer");
    Route::get('/list/orders/{order}/accept', "ServiceController@acceptOffer");

    Route::get('/list/events', "AdminController@listEvents");
    Route::get('/list/events/remove/{event}', "AdminController@removeEvent");
    Route::get('/list/events/{event}/tickets', "AdminController@eventTickets");
    Route::get('/list/events/revokeTicket/{ticket}', "AdminController@revokeTicket");
    Route::get('/list/events/unrevokeTicket/{ticket}', "AdminController@unrevokeTicket");

    Route::get('/list/providers', "AdminController@listProviders");
    Route::get('/list/provider/{user}/verify', "AdminController@verifyProvider");
    Route::get('/list/provider/{user}/unverify', "AdminController@unverifyProvider");

    ////////////////////////////////////////////////////////////

    Route::get('/payments/due', "PaymentController@showDuePayments");
    Route::get('/payments/due/{provider}', "PaymentController@showProviderDuePayments");
    Route::get('/payments/due/{payment}/transfer', "PaymentController@confirmMoneyTransfer");

    Route::get('/payments/rates', "PaymentController@showCurrencyRates");
    Route::post('/payments/rates/add', "PaymentController@addCurrency");
    Route::any('/payments/rates/{currency}/update', "PaymentController@updateCurrencyRates");
    Route::any('/payments/rates/{currency}/enable', "PaymentController@enableCurrency");
    Route::any('/payments/rates/{currency}/disable', "PaymentController@disableCurrency");
});

Route::get('/admin/login', 'AdminController@loginpage');
Route::get('/admin/logout', 'AdminController@logout');
Route::post('/admin/login', 'AdminController@login');

?>
