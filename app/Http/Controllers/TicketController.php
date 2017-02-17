<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Mail;

class TicketController extends Controller
{
    public function regEvent(Request $request){
        $input = $request->all();

        $event = \App\Models\Event::find($input["event_id"]);

        //Calculate the total amount
        $total = 0;
        foreach ($input['packages'] as $p) {
            $pack = \App\Models\Pack::find($p);
            $total += $pack->calcNaira();
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

        return ['status'=>"success", "url"=>url("events/ticket/show/".$ticket->ticket)];
    }

    public function showTicket($ticket_code){
        $ticket = \App\Models\Ticket::where('ticket', $ticket_code)->first();

        if(!$ticket){
            return "This ticket doesn't exist";
        }

        if($ticket->revoked){
            return "Sorry this ticket has been revoked. Please contact Youpple events";
        }

        $from = "events@youpple.com";
        $to = $ticket->email;
        $toName = $ticket->name;
        $subject = "Ticket Purchased for ".$ticket->event->title;

        $this->sendEmail($from, $to, $toName, $subject, compact('ticket'));

        return view("events.showTicket", compact('ticket'));
    }

    public function sendEmail($from, $to, $toName, $subject, $objectArray)
    {
        Mail::send('email.ticket', $objectArray, function ($message) use ($from, $to, $toName, $subject)
        {
            $message->from($from);
            $message->to($to, $toName)->subject($subject);
        });
    }
}
