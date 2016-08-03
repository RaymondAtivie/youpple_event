<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

use App\Http\Requests;

class AdminController extends Controller
{
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

    public function logout()
    {
        Auth::guard('admin')->logout();
        \Session::flush();
        return Redirect::to('admin/login')->withMessage("See you soon");
    }

    public function dashboard(){
        return view('admin.pages.index');
    }

    ///////--- HOME -----///////////////
    public function showLogo(){
        return view('admin.pages.home.logos');
    }
    public function showSocial(){
        return view('admin.pages.home.social');
    }
    public function showPrivacyPolicy(){
        return view('admin.pages.home.privacy');
    }
    public function showAdvert(){
        return view('admin.pages.home.advert');
    }
    public function showTermsOfUse(){
        return view('admin.pages.home.termsofuse');
    }
    public function showTermsAndConditions(){
        return view('admin.pages.home.terms');
    }

    ///////--- ABOUT -----///////////////
    public function showClients(){
        return view('admin.pages.about.clients');
    }
    public function showPartners(){
        return view('admin.pages.about.partners');
    }
    public function showInfo(){
        return view('admin.pages.about.information');
    }
    public function showTestimonials(){
        return view('admin.pages.about.testimonials');
    }

    ///////--- FEATURED -----///////////////
    public function showFeaturedEvents(){
        return view('admin.pages.feature.events');
    }
    public function showFeaturedProviders(){
        return view('admin.pages.feature.providers');
    }

}
