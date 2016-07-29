<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Adminuser;
use App\Csetting;
use App\User;
use App\Event;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Hash;


class adminController extends Controller
{
    // Student Dashboard
    // Admin Dashboard
    public function dashboard(){
        return view('admin.pages.index');
    }
    public function login() {
        $user = Input::get('username');
        $password = Input::get('password');
        if (Auth::guard('admin')->attempt(['username' => $user, 'password' => $password])) {
            return redirect()->intended('admin/');
        }elseif(Auth::guard('admin')->attempt(['email' => $user, 'password' => $password])){
          return redirect()->intended('admin/');
        }else{
            return Redirect::to('admin/login')->withErrors("Wrong details");

        }
    }

    public function loginpage(){
        if (Auth::guard('admin')->guest()) {
            return view('admin.login');
        }
        return redirect()->intended('admin/');
    }
    ////
    /////////
    public function csettings(){
        $rcategories = Csetting::orderby('name', 'asc')->get();
        return view('admin.pages.csettings', compact('rcategories'));
    }
    public function addcsettingpage(){
        return view('admin.pages.addcsetting');
    }
    public function addCsetting(){
        // dd(Input::all());
        $rules = array(
          'lower' => 'required|unique:csettings',
          'higher' => 'required|unique:csettings',
          'percentage' => 'required',
          'extra' => 'required',
          'code' => 'required|unique:csettings',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('admin/commissionsettings/add')->withErrors($validator);
        } else {
            $user = new Csetting;
            $user->lower = Input::get('lower');
            $user->higher = Input::get('higher');
            $user->percentage = Input::get('percentage');
            $user->extra = Input::get('extra');
            $user->code = Input::get('code');
            $user->save();

            return Redirect::to('admin/commissionsettings/add')->with('message', $user->code . ' Commission setting added successfully.');
        }
    }
    public function allevents(){
        $events = Event::all();
        return view('admin.pages.allevents', compact('events'));
    }
    public function eventattendees($id)
    {
        $event = Event::find($id);
        $attendees = $event->attendees;
        return view('admin.pages.eventattendees', compact('event','attendees'));
    }

    public function siteusers(){
        $users = User::all();
        return view('admin.pages.users', compact('users'));
    }
    public function adminusers(){
        $adminusers = Adminuser::all();
        return view('admin.pages.adminusers', compact('adminusers'));
    }


    public function postAdminuser(){
        $rules = array(
            'email' => 'required|unique:adminusers',
            'username' => 'required|unique:adminusers',
            'password' => 'required',
            'fullname' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('admin/adminusers')->withErrors($validator);
        } else {
            $user = new Adminuser;
            $user->fullname = Input::get('fullname');
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();

            return Redirect::to('admin/adminusers')->with('message', $user->username . ' User added successfully.');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        \Session::flush();
        return Redirect::to('admin/login')->withMessage("See you soon");
    }

}
