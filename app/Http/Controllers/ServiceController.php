<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Helpers\M;
use App\Models\ServiceOrder;
use App\Models\PaymentHistory;
use Auth;

class ServiceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function orderService(){
        $intrests = M::getIntrests();
        $services = M::getServices();

        return view("events.orderService", compact("intrests", "services"));
    }

    public function createOrder(Request $request){
        $r = $request->all();

        // dd($r);

        $s = Auth::user()->createServiceOrder($r);
        M::flash("Successfully Ordered the service. Expect an email", "success");

        return Redirect::back();
    }

    public function showServiceOrders(){
        $orders = Auth::user()->getOrdersToYoupple();

        return view('events.myorders', compact('orders'));
    }

    public function showServiceOrdersToOthers(){
        $orders = Auth::user()->getOrdersToOthers();

        return view('events.myordersOthers', compact('orders'));
    }

    public function showServiceOrdersToMe(){
        $orders = Auth::user()->getOrdersToMe();

        return view('events.myordersMe', compact('orders'));
    }

    public function showPaidOrders(){
        $orders = Auth::user()->getPaidOrders();

        return view('events.myordersPaid', compact('orders'));
    }

    public function confirmPaidOrders(PaymentHistory $payment){
        $payment->status = "confirmed";
        $payment->save();

        M::flash("Your Service order has been confirmed", "success");
        return Redirect::back();
    }

    public function complainPaidOrders(Request $request, PaymentHistory $payment){
        $payment->status = "complain";
        $payment->message = $request->get("message");
        $payment->save();

        M::flash("Your Service order complain has been noted", "warning");
        return Redirect::back();
    }

    public function counterOffer(ServiceOrder $order, Request $request){
        $newBudget = $request->get("budget");
        $made_by = $request->get("made_by");
        $iMade = $request->get("iMade");
        $message = $request->get("message");

        $history = $order->history;

        $history[] =  [
            'budget' => $newBudget,
            'datetime' => \Carbon\Carbon::now()->format("d/m/Y H:i"),
            'made_by' => $made_by,
            'message' => $message,
        ];

        $order->history = $history;
        $order->budget = $newBudget;
        if($iMade == "user"){
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

    public function payOrder(ServiceOrder $order, Request $request){
        $order->status = "paid";
        $order->save();

        $order->addToHistory();

        //SEND EMAIL

        return ['status'=>"success", "url"=>url("events/myorders/".$order->id."/confirmpay")];
    }

    public function confirmPay(ServiceOrder $order){
        M::flash("You have successfully paid for this service", "success");

        return Redirect::back();
        // return ['status'=>"success", "url"=>url("events/ticket/show/".$ticket->ticket)];
    }



}
