<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class TicketController extends Controller
{
    public function regEvent(Request $request){
        $input = $request->all();

        $event = \App\Models\Event::find($input["event_id"]);

        //Calculate the total amount
        $total = 0;
        foreach ($input['packages'] as $p) {
            $pack = \App\Models\Package::find($p);
            $total += $pack->fee_amount;
            $packages[] = $pack;
        }

        if(!Auth::check()){
            $owner = array("name"=>$input['name'], "email"=>$input['email'], "phone"=>$input['phone']);
        }else{
            $owner = array("name"=>Auth::user()->name, "email"=>Auth::user()->email, "phone"=>Auth::user()->phone);
        }

        return view("events.payEvent", compact('event', 'packages', 'total', 'owner'));
    }

    private function generateTicketNum($length = 7){
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

        $string = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $string .= $characters[mt_rand(0, $max)];
        }

        return $string;
    }

    public function saveTicket(Request $request){
        $inputs = $request->all();
        $inputs['packages'] = explode(",", trim($inputs['packages'],','));
        $inputs['ticket'] = $this->generateTicketNum();

        $ticket = \App\Models\Ticket::create($inputs);

        return ['status'=>"success", "url"=>url("events/ticket/show?ticket=".$ticket->ticket)];
    }


    public function showTicket(Request $request){
        $t = $request->get("ticket");

        $T = \App\Models\Ticket::where('ticket', $t)->first();

        dd($T);
    }
}
