<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Auth;
use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap the application services.
    *
    * @return void
    */
    public function boot()
    {
        View::composer('*', function($view){
            $view->with(['user'=>Auth::user()]);
        });
        View::composer('auth.*', function($view){
            $view->with(['pageType'=>'event']);
        });
        View::composer('events.*', function($view)
        {
            $view->with(['pageType'=>'event']);
        });
    }

    /**
    * Register the application services.
    *
    * @return void
    */
    public function register()
    {
        //
    }
}
