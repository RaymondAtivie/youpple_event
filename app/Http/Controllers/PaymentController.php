<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Models\UserInfo;
use App\Models\ServiceOrder;
use App\Models\PaymentHistory;
use App\User;
use App\Helpers\M;
use DB;

class PaymentController extends Controller
{
    public function showDuePayments(){

        $payments = PaymentHistory::select('provider_id', DB::raw('SUM(amount) as total'))
        ->where("provider_id", "!=", 0)
        ->groupBy('user_id')
        ->get();

        foreach($payments as $ph){
            $provider = User::find($ph->provider_id);

            $lists[] = [
                "provider" => $provider,
                "amount" => $ph->total
            ];
        }

        return view("admin.pages.payment.paymentsDue", compact('lists'));

    }

    public function showProviderDuePayments(User $provider){
        $lists = PaymentHistory::where("provider_id", $provider->id)->get();

        return view("admin.pages.payment.providerPaymentsDue", compact('provider', 'lists'));
    }

    public function confirmMoneyTransfer(PaymentHistory $payment){
        $payment->youpple_pay = "yes";
        $payment->save();

        M::flash("Successfully recorded", "success");

        return Redirect::back();

    }
}
