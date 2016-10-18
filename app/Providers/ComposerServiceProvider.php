<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Auth;
use View;
use App\Helpers\M;

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
            $socials = M::getSocials();

            $view->with([
                'user'=>Auth::user(),
                'isLoggedIn'=>Auth::check(),
                'social_links'=>$socials
            ]);
        });
        View::composer('auth.*', function($view){
            $view->with(['pageType'=>'event']);
        });
        View::composer('events.*', function($view){
            $view->with(['pageType'=>'event']);
        });
        View::composer('events.fEvent', function($view){
            $fEvents = \App\Models\Event::where("published", "true")->where("featured", "true")->get();
            $fProviders = \App\Models\UserInfo::where("featured", 1)->get();
            $services = M::getServices();

            $view->with([
                'services'=>$services,
                'fEvents'=>$fEvents,
                'fProviders'=>$fProviders,
            ]);
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
