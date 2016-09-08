<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
