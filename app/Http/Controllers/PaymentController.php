<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\UserInfo;
use App\Models\ServiceOrder;
use App\Models\PaymentHistory;
use App\User;
use DB;

class PaymentController extends Controller
{
    public function showDuePayments(){

        $PHs = PaymentHistory::select('provider_id', DB::raw('SUM(amount) as total'))
        // ->where("status", "paid")
        ->where("provider_id", "!=", 0)
        ->groupBy('user_id')
        // ->havingRaw('SUM(amount) > 0')
        ->get();

        foreach($PHs as $ph){
            // $provider = User::find($ph->provider_id);
            $lists[] => [
                "provider" => $provider,
                "amount" => $ph->amount
            ];
        }

        return view("admin.pages.payment.paymentsDue", compact('lists'));

    }
}
