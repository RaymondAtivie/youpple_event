<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\M;

class EventConfirm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session()->has('event')){
            M::flash("Create an event first", "info");

            return redirect('events/create');
        }
        return $next($request);
    }
}
