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

require_once("Routes/Api/index.php");

Route::get('/', 'PagesController@index');
Route::get('/home', 'HomeController@index');
Route::get('/about', 'PagesController@about');
Route::get('/what-we-do', 'PagesController@whatWeDo');
Route::get('/who-we-are', 'PagesController@whoWeAre');

require_once("Routes/event.php");
require_once("Routes/admin.php");
