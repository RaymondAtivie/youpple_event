<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Helpers\M;
use App\Models\ServiceOrder;
use Auth;

class ServiceController extends Controller
{
    public function orderService(){
        $intrests = M::getIntrests();
        $services = M::getServices();

        return view("events.orderService", compact("intrests", "services"));
    }

    public function createOrder(Request $request){
        $r = $request->all();

        $s = Auth::user()->createServiceOrder($r);

        dd($s);
    }

    public function showServiceOrders(){
        $orders = Auth::user()->serviceOrders;

        return view('events.myorders', compact('orders'));
    }

    public function counterOffer(ServiceOrder $order, Request $request){
        $newBudget = $request->get("budget");
        $made_by = $request->get("made_by");
        $message = $request->get("message");

        $history = json_decode($order->history);

        $history[] =  [
            'budget' => $newBudget,
            'datetime' => \Carbon\Carbon::now()->format("d/m/Y H:i"),
            'made_by' => $made_by,
            'message' => $message,
        ];

        $order->history = $history;
        $order->budget = $newBudget;
        if($made_by == "user"){
            $order->status = "pending";
        }else{
            $order->status = "counter";
        }
        $order->save();

        M::flash("Successfully counter offered", "success");

        return Redirect::back();
    }

    public function acceptOffer(ServiceOrder $order){
        $order->status = "accepted";
        $order->save();

        //SEND EMAIL OR/AND SMS

        M::flash("Successfully accepted offer. Email would be sent to the user", "success");

        return Redirect::back();
    }

    public function declineOffer(ServiceOrder $order){
        $order->status = "declined";
        $order->save();

        //SEND EMAIL OR/AND SMS

        M::flash("Successfully declined this offer. Email would be sent to the user", "danger");

        return Redirect::back();
    }


    public function cancelOffer(ServiceOrder $order){
        $order->status = "cancelled";
        $order->save();

        //SEND EMAIL OR/AND SMS

        M::flash("Your offer has been cancelled", "danger");

        return Redirect::back();
    }
}
