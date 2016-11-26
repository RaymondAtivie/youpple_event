<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Models\UserInfo;
use App\Models\ServiceOrder;
use App\Models\Currency;
use App\Models\PaymentHistory;
use App\User;
use App\Helpers\M;
use DB;
use HTML;
use Auth;

class PaymentController extends Controller
{
    public function showDuePayments(){

        $payments = PaymentHistory::
        // select('provider_id', DB::raw('SUM(amount) as total'))
        where("provider_id", "!=", 0)
        ->groupBy('provider_id')
        ->get();

        // dd($payments);

        foreach($payments as $ph){
            $provider = User::find($ph->provider_id);

            $paymentList = PaymentHistory::where('provider_id', $provider->id)->get();
            $allAmount = 0;
            foreach ($paymentList as $pl) {
                $allAmount += Currency::find($pl->currency)->calcNaira($pl->amount);
            }

            $paymentList = PaymentHistory::where('provider_id', $provider->id)->where('status', "confirmed")->get();
            $confirmedAmount = 0;
            foreach ($paymentList as $pl) {
                $confirmedAmount += Currency::find($pl->currency)->calcNaira($pl->amount);
            }

            $paymentList = PaymentHistory::where('provider_id', $provider->id)->where('youpple_pay', "yes")->get();
            $paidAmount = 0;
            foreach ($paymentList as $pl) {
                $paidAmount += Currency::find($pl->currency)->calcNaira($pl->amount);
            }

            $lists[] = [
                'provider'=>$provider,
                'made'=>$allAmount,
                'confirmed'=>$confirmedAmount,
                'paid'=>$paidAmount,
                'due'=>$confirmedAmount - $paidAmount,
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
        $payment->youpple_staff = Auth::guard('admin')->user()->id;
        $payment->save();

        M::flash("Successfully recorded", "success");

        return Redirect::back();
    }

    public function showCurrencyRates(){

        $currencies = M::getCurrencies("all");

        return view("admin.pages.payment.rates", compact('currencies'));
    }

    public function updateCurrencyRates(Currency $currency, Request $request){
        $currency->rate = $request->get("rate");
        $currency->symbol = $request->get("symbol");
        $currency->name = $request->get("name");
        $currency->short_name = $request->get("short_name");
        $currency->save();

        M::flash("Successfully updated the currency rate", "success");

        return Redirect::back();
    }

    public function addCurrency(Request $request){
        $post = $request->all();

        Currency::create($post);
        M::flash("Successfully added the new currency", "success");

        return Redirect::back();
    }

    public function disableCurrency(Currency $currency){
        $currency->visible = false;
        $currency->save();

        M::flash("Successfully disabled currency", "warning");

        return Redirect::back();
    }
    public function enableCurrency(Currency $currency){
        $currency->visible = true;
        $currency->save();

        M::flash("Successfully enabled currency", "success");

        return Redirect::back();
    }
}
