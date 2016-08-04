<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

use App\Http\Requests;
use App\Slim;

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
    public function forms(){
        return view('admin.pages.forms');
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

    ////
    // public function addVendorprofile() {
    //   $gallery = [];
    //   $slim = Input::get('slim');
    //
    //   // $description =  Purifier::clean(Input::get('description'));
    //   $description =  Input::get('description');
    //   $images = Slim::getImages();
    //
    //   // dd(Input::all());
    //   if ($images == false || $slim[0] == "") {
    //     return response()->json(['result' => 'ferror','description' => 'Featured Image required']);
    //   }else {
    //     $rules = array(
    //         'slim' => 'required|min:1',
    //         'name' => 'required',
    //         'description' => 'required',
    //         'state' => 'required',
    //         'category' => 'required',
    //         'address' => 'required',
    //         'contact' => 'required',
    //         'pricerange' => 'required',
    //         'mobile' => 'required',
    //         'email' => 'required',
    //         'travel' => 'required',
    //
    //     );
    //     $redirect = url('myaccount/profiles');
    //
    //     $validator = Validator::make(Input::all(), $rules);
    //     if ($validator->fails()){
    //         return response()->json(['result' => 'valerror','details' => $validator->messages()], 200);
    //     }else {
    //       foreach ($images as $image) {
    //         $file = Slim::saveFile($image['output']['data'],$image['input']['name'],$image['input']['ext'],NULL);
    //         $gallery[] = ellipsis($file['name'],100);
    //       }
    //       $obj =  new Vendorprofile;
    //       $obj->name = Input::get('name');
    //       $slug = to_slug(Input::get('name'));
    //       $obj->slug = $slug;
    //       $code = generate_profile_code();
    //       $obj->code = $code;
    //
    //       $obj->category_id = Input::get('category');
    //       $obj->subcategory_ids = json_encode(Input::get('subcategory_ids'));
    //       $obj->description = $description;
    //       $obj->state_id = Input::get('state');
    //       $obj->tagline = Input::get('tagline');
    //       $obj->pricerange_id = Input::get('pricerange');
    //       $obj->address = Input::get('address');
    //       $obj->email = Input::get('email');
    //       $obj->travel = Input::get('travel');
    //       $obj->mobile = Input::get('mobile');
    //       $obj->contact = Input::get('contact');
    //       $obj->website = Input::get('website');
    //       $obj->social = json_encode(Input::get('social'));
    //       $obj->location = json_encode(Input::get('location'));
    //       $obj->featured = $gallery[0];
    //       $obj->gallery = json_encode($gallery);
    //       $obj->user_id = Auth::user()->user_id;
    //       $obj->save();
    //       return response()->json(['result' => 'success','link' => $redirect]);
    //
    //       // dd(Input::all());
    //     }
    //   }
    //   // dd($gallery);
    //   // dd(Input::all());
    // }


}
