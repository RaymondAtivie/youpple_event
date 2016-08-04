<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TicketController extends Controller
{
    public function regEvent(Request $request){
        dd($request->all());
    }
}
