<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\UserInfo;
use App\Models\ServiceOrder;
use DB;

class PaymentController extends Controller
{
    public function showDuePayments(){

        $s = ServiceOrder::select('user_id', 'provider_id', DB::raw('SUM(budget) as total'))
        ->where("status", "paid")->where("provider_id", "!=", 0)
        ->groupBy('user_id')
        ->havingRaw('SUM(budget) > 0')
        ->get();

        dd($s);
    }
}
