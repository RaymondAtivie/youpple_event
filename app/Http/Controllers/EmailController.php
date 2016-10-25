<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use Validator;
use Carbon\Carbon;

use App\Http\Requests;
use App\Slim;
use App\Helpers\M;
use App\Models\Event;
use App\Models\EventType;
use App\Models\ServiceList;
use App\Models\Ticket;
use App\Models\UserInfo;
use App\User;

use Mail;

class EmailController extends Controller
{
    public function showSendEmail(){
        return view('admin.pages.email.emailTo');
    }

    public function showSendSMS(){
        return view('admin.pages.email.smsTo');
    }

    public function sendEmail(Request $request){
        $post = $request->all();
        $to = $post['to'];
        $subject = $post['subject'];
        $body = $post['body'];

        if($to == "all"){
            $uls = User::get();
        }elseif($to == 'allsp'){
            $userList = UserInfo::get();
        }elseif($to == 'allisp'){
            $userList = UserInfo::where("user_type", 'customer')->get();
        }elseif($to == 'allbsp'){
            $userList = UserInfo::where("user_type", 'provider')->get();
        }

        if(isset($userList)){
            foreach($userList as $UL){
                if(isset($UL->user)){
                    $um['email'] = $UL->user->email;

                    if(strtolower($UL->user_type) == 'business'){
                        $um['name'] = $UL->business_name;
                    }else{
                        $um['name'] = $UL->user->name;
                    }

                    $uArray[] = $um;
                }
            }
        }

        if(isset($uls)){
            foreach($uls as $UL){
                $um['email'] = $UL->email;
                $um['name'] = $UL->name;

                $uArray[] = $um;
            }
        }

        $this->fileEmails($uArray, $subject, $body);

        M::flash("Emails successfully sent", "success");

        return Redirect::back();

    }

    public function sendSMS(Request $request){
        $post = $request->all();
        $to = $post['to'];
        $text = $post['text'];

        if($to == "all"){
            $uls = User::get();
        }elseif($to == 'allsp'){
            $userList = UserInfo::get();
        }elseif($to == 'allisp'){
            $userList = UserInfo::where("user_type", 'customer')->get();
        }elseif($to == 'allbsp'){
            $userList = UserInfo::where("user_type", 'provider')->get();
        }

        if(isset($userList)){
            foreach($userList as $UL){
                if(isset($UL->user)){
                    $um['phone'] = $UL->user->phone;

                    if(strtolower($UL->user_type) == 'business'){
                        $um['name'] = $UL->business_name;
                    }else{
                        $um['name'] = $UL->user->name;
                    }

                    $uArray[] = $um;
                }
            }
        }

        if(isset($uls)){
            foreach($uls as $UL){
                $um['phone'] = $UL->phone;
                $um['name'] = $UL->name;

                $uArray[] = $um;
            }
        }

        $this->fileSMS($uArray, $text);

        M::flash("SMSs successfully sent", "success");

        return Redirect::back();

    }


    private function fileEmails($usersArray, $subject, $body){
        foreach($usersArray as $userMan){

            Mail::send('emails.plain', ['userMan' => $userMan, 'body' => $body, 'subject' => $subject],
            function ($m) use ($userMan, $subject) {
                $m->from('events@youpple.com', 'Youpple Events');
                $m->to($userMan['email'], $userMan['name'])->subject($subject);
            });

        }
    }

    private function fileSMS($usersArray, $text){
        foreach($usersArray as $userMan){

            //TODO: SMS APIS

        }
    }
}
