<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function searchEvents(Request $request){
        $search = $request->all();
        
        if(!isset($search['title'])){
            $search['title'] = "";
        }
        if(!isset($search['name'])){
            $search['name'] = "";
        }
        if(!isset($search['type'])){
            $search['type'] = "event";
        }
        if(!isset($search['datebefore'])){
            $search['datebefore'] = "";
        }
        if(!isset($search['dateafter'])){
            $search['dateafter'] = "";
        }
        if(!isset($search['country'])){
            $search['country'] = "";
        }
        if(!isset($search['event_type'])){
            $search['event_type'] = "";
        }
        
        session()->put('search_title', $search['title']);
        session()->put('search_name', $search['name']);
        session()->put('search_event_type', $search['event_type']);
        session()->put('search_type', $search['type']);
        session()->put('search_datebefore', $search['datebefore']);
        session()->put('search_dateafter', $search['dateafter']);
        session()->put('search_country', $search['country']);
        
        $events = [];
        if($search['type'] != "providers"){
            $eBuilder = \App\Models\Event::where('title', 'like', '%' .$search['title']. '%')
            ->where('published', "true");
            
            if($search['datebefore']){
                $eBuilder->whereDate('datetime', '<=', Carbon::createFromFormat('Y-m-d', $search['datebefore'])->toDateTimeString());
            }
            if($search['dateafter']){
                $eBuilder->whereDate('datetime', '>=', Carbon::createFromFormat('Y-m-d', $search['dateafter'])->toDateTimeString());
            }
            $events = $eBuilder->get();
        }
        
        
        $providers = [];
        if($search['type'] == "provider"){
            $ps = \App\Models\UserInfo::get();
            $pArray = [];
            
            foreach($ps as $p){
                if($search['event_type'] != ""){
                    if(in_array(strtolower($search['event_type']), array_map('strtolower', $p->event_services))){
                        if($p->user){
                            print_r($search['name']);

                            if($search['name'] != ""){
                                $ii = strpos(strtolower($p->user->name), strtolower($search['name']));
                            }else{
                                $ii = true;
                            }

                            if($ii !== false){
                                $pArray[] = $p;
                            }else{
                                if($p->user_type = "Business"){
                                    if(strpos(strtolower($p->business_name), strtolower($search['name'])) !== false){
                                        $pArray[] = $p;
                                    }
                                }
                            }
                        }
                    }
                }else{
                    if($p->user){
                        if(strpos(strtolower($p->user->name), strtolower($search['name'])) !== false){
                            $pArray[] = $p;
                        }else{
                            if($p->user_type = "Business"){
                                if(strpos(strtolower($p->business_name), strtolower($search['name'])) !== false){
                                    $pArray[] = $p;
                                }
                            }
                        }
                    }
                }
                
            }
            $providers = $pArray;
        }
        
        // dd($events);
        
        return view("events/search/eventSearch", compact("search", "events", "providers"));
    }
}