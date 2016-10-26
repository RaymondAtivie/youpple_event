<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    public function searchEvents(Request $request){
        $search = $request->all();

        $eBuilder = \App\Models\Event::where('title', 'like', '%' .$search['title']. '%');

        if($search['country']){
            $eBuilder->where("country", $search['country']);
        }

        $events = $eBuilder->get();

        return view("events/search/eventSearch", compact("search", "events"));
    }
}
