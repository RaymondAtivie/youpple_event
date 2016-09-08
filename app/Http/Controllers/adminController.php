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
use App\Models\Ticket;
use App\Models\UserInfo;
use App\User;

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
        $today = Carbon::today()->toDateString();
        $totalEvents = Event::count();
        $pastEvents = Event::whereDate('datetime_end', '<', $today)->whereDate('datetime', '<', $today)->count();
        $onEvents = Event::whereDate('datetime', '=', $today)->count();
        $futureEvents = Event::whereDate('datetime', '>', $today)->count();

        $totalTickets = Ticket::count();
        $totalTicketSales = M::getTotalTicketSales();

        $totalUsers = User::count();
        $totalProviders = UserInfo::where('user_type', 'provider')->count();
        $totalCustomers = $totalUsers - $totalProviders;

        return view('admin.pages.index',
        compact('totalEvents', 'pastEvents', 'onEvents', 'futureEvents',
        'totalTickets', 'totalTicketSales',
        'totalUsers', 'totalProviders', 'totalCustomers'));
    }
    public function forms(){
        return view('admin.pages.forms');
    }

    ///////--- HOME -----///////////////
    public function showLogo(){
        $logos = M::getLogos();

        return view('admin.pages.home.logos', compact('logos'));
    }
    public function changeLogo($logoname, Request $request){
        $images = Slim::getImages('logo');
        $p = $request->all();

        if(isset($images[0])){
            $image = $images[0];

            $lExt = $image['input']['ext'];
            $lName = $image['input']['name'];
            $lData = $image['output']['data'];

            $file = Slim::saveFile($lData, $lName, "jpg", false);

            $filename = "logos/".$logoname.".".$lExt;
            rename($file['path'], "images/".$filename);

            M::setDocuments($p['key']."_logo", $filename);
        }

        M::setDocuments($p['key']."_name", $p['name']);

        M::flash("Successfully changed ".$p['key'], "success");

        return redirect('admin/home/logo');
    }

    public function showSocial(){
        $socials = M::getSocials();

        return view('admin.pages.home.social', compact('socials'));
    }
    public function changeSocial(Request $request){
        $r = $request->all();

        unset($r['_token']);

        foreach ($r as $key => $value) {
            M::setDocuments($key, $value);
        }

        M::flash("Successfully Updated", "success");

        return redirect('admin/home/social');
    }

    public function showPrivacyPolicy(){
        $privacy = M::getDocuments("privacy_policy");

        return view('admin.pages.home.privacy', compact('privacy'));
    }
    public function changePrivacyPolicy(Request $request){
        $privacy = $request->get("privacy");

        M::setDocuments("privacy_policy", $privacy);
        M::flash("Successfully Updated", "success");

        return redirect('admin/home/privacy');
    }

    public function showAdvert(){
        $ad = M::getDocuments("advertising");

        return view('admin.pages.home.advert', compact("ad"));
    }
    public function changeAdvert(Request $request){
        $ad = $request->get("advert");

        M::setDocuments("advertising", $ad);
        M::flash("Successfully Updated", "success");

        return redirect('admin/home/advert');
    }

    public function showTermsOfUse(){
        $terms_of_use = M::getDocuments("terms_of_use");

        return view('admin.pages.home.termsofuse', compact("terms_of_use"));
    }

    public function changeTermsOfUse(Request $request){
        $TOU = $request->get("terms_of_us");

        M::setDocuments("terms_of_use", $TOU);
        M::flash("Successfully Updated", "success");

        return redirect('admin/home/termsofuse');
    }

    public function showTermsAndConditions(){
        $terms = M::getDocuments("terms");

        return view('admin.pages.home.terms', compact('terms'));
    }

    public function changeTermsAndConditions(Request $request){
        $terms = $request->get("terms");

        M::setDocuments("terms", $terms);
        M::flash("Successfully Updated", "success");

        return redirect('admin/home/terms');
    }

    ///////--- ABOUT -----///////////////


    public function showInfo(){
        $header = M::getAboutData("header");
        $description = M::getAboutData("description");
        $aboutImage = M::getAboutData("image");
        $logos = M::getAboutLogos();

        return view('admin.pages.about.information', compact('logos', 'header', 'description', 'aboutImage'));
    }
    public function changeInfo(Request $request){
        $header = $request->get("header");
        $description = $request->get("description");

        M::setAboutData("header", $header);
        M::setAboutData("description", $description);

        M::flash("Successfully Updated About Page Info", "success");

        return redirect('admin/about/info');
    }
    public function changeInfoLogo($logoname, Request $request){

        $images = Slim::getImages('logo');
        $p = $request->all();

        if(isset($images[0])){
            $image = $images[0];

            $lExt = $image['input']['ext'];
            $lName = $image['input']['name'];
            $lData = $image['output']['data'];

            $file = Slim::saveFile($lData, $lName, "jpg", false);

            $filename = "logos/".$logoname.".".$lExt;
            rename($file['path'], "images/".$filename);

            M::setAboutData($p['key']."_logo", $filename);
        }

        M::setAboutData($p['key']."_name", $p['name']);
        M::setAboutData($p['key']."_desc", $p['name']);

        M::flash("Successfully changed ".$p['key'], "success");

        return redirect('admin/about/info');
    }
    public function changeInfoImage(Request $request){
        $images = Slim::getImages('image');

        if(isset($images[0])){
            $image = $images[0];

            $lExt = $image['input']['ext'];
            $lName = $image['input']['name'];
            $lData = $image['output']['data'];

            $file = Slim::saveFile($lData, $lName, "jpg", false);

            $filename = "page/aboutimage.".$lExt;
            rename($file['path'], "images/".$filename);

            M::setAboutData("image", $filename);
            M::flash("Successfully Updated About Image", "success");
        }

        return redirect('admin/about/info');
    }

    //// CLIENTS CONTROL //////
    public function showClients(){
        $clients = M::getClients();

        return view('admin.pages.about.clients', compact('clients'));
    }

    public function saveClient(Request $request){
        $info = $request->all();


        $images = Slim::getImages('image');

        $info['image'] = "clients/unknown.jpg";
        if(isset($images[0])){
            $image = $images[0];

            $lExt = $image['input']['ext'];
            $lName = $image['input']['name'];
            $lData = $image['output']['data'];

            $file = Slim::saveFile($lData, $lName, "jpg", false);

            $filename = "team/".rand(1000, 99999999999).".".$lExt;
            rename($file['path'], "images/".$filename);

            $info['image'] = $filename;
        }

        M::addClient($info);

        M::flash("Successfully added a client", "success");

        return Redirect::back();
    }
    public function removeClient($clientId){
        M::removeClient($clientId);

        M::flash("Successfully removed the client", "danger");

        return Redirect::back();
    }

    //// TESTIMONY CONTROLS /////
    public function showTestimonials(){
        $testimonials =  M::getTestimonials();

        return view('admin.pages.about.testimonials', compact('testimonials'));
    }

    public function saveTestimony(Request $request){
        $info = $request->all();

        $images = Slim::getImages('image');

        $info['image'] = "testimonials/unknown.jpg";
        if(isset($images[0])){
            $image = $images[0];

            $lExt = $image['input']['ext'];
            $lName = $image['input']['name'];
            $lData = $image['output']['data'];

            $file = Slim::saveFile($lData, $lName, "jpg", false);

            $filename = "team/".rand(1000, 99999999999).".".$lExt;
            rename($file['path'], "images/".$filename);

            $info['image'] = $filename;
        }

        M::addTestimony($info);

        M::flash("Successfully added a testimony", "success");

        return Redirect::back();
    }
    public function removeTestimony($testimonyId){
        M::removeTestimony($testimonyId);

        M::flash("Successfully removed the testimony", "danger");

        return Redirect::back();
    }


    /////// PARTNERS CONTROLS //////////
    public function showPartners(){
        $partners = M::getPartners();
        return view('admin.pages.about.partners', compact('partners'));
    }
    public function savePartner(Request $request){
        $info = $request->all();

        $images = Slim::getImages('image');

        $info['image'] = "partners/unknown.jpg";
        if(isset($images[0])){
            $image = $images[0];

            $lExt = $image['input']['ext'];
            $lName = $image['input']['name'];
            $lData = $image['output']['data'];

            $file = Slim::saveFile($lData, $lName, "jpg", false);

            $filename = "team/".rand(1000, 99999999999).".".$lExt;
            rename($file['path'], "images/".$filename);

            $info['image'] = $filename;
        }

        M::addPartner($info);

        M::flash("Successfully added a partner", "success");

        return Redirect::back();
    }
    public function removePartner($partnerId){
        M::removePartner($partnerId);

        M::flash("Successfully removed the partner", "danger");

        return Redirect::back();
    }

    /////// TEAM CONTROLS //////////
    public function showTeam(){
        $team = M::getTeam();
        return view('admin.pages.about.team', compact('team'));
    }
    public function saveTeam(Request $request){
        $info = $request->all();

        $images = Slim::getImages('image');

        $info['image'] = "team/unknown.jpg";
        if(isset($images[0])){
            $image = $images[0];

            $lExt = $image['input']['ext'];
            $lName = $image['input']['name'];
            $lData = $image['output']['data'];

            $file = Slim::saveFile($lData, $lName, "jpg", false);

            $filename = "team/".rand(1000, 99999999999).".".$lExt;
            rename($file['path'], "images/".$filename);

            $info['image'] = $filename;
        }

        M::addTeam($info);

        M::flash("Successfully added a team member", "success");

        return Redirect::back();
    }
    public function removeTeam($teamId){
        M::removeTeam($teamId);

        M::flash("Successfully removed the team member", "danger");

        return Redirect::back();
    }


    /////////////////////////////////////////////////////////////////////////
    ///////--- FEATURED -----////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////
    public function showFeaturedEvents(){
        $events = Event::where('featured', 'false')->get();

        $fEvents = Event::where('featured', 'true')->get();

        return view('admin.pages.feature.events', compact("events", "fEvents"));
    }

    public function addToFeaturedEvent(Event $event){
        $event->featured = 'true';
        $event->save();

        M::flash("Successfully Added to featured events", "success");
        return redirect('admin/feature/events');
    }

    public function removeFromFeaturedEvent(Event $event){
        $event->featured = 'false';
        $event->save();

        M::flash("Successfully Removed from featured events", "danger");
        return redirect('admin/feature/events');
    }

    public function showFeaturedProviders(){
        $UI = new \App\Models\UserInfo;
        $fProviders = $UI->getAllProviders('featured');
        $providers = $UI->getAllProviders('unfeatured');

        return view('admin.pages.feature.providers', compact('providers', 'fProviders'));
    }
    public function addToFeaturedProvider(\App\User $user){
        $user->info->featured = 1;
        $user->info->save();

        M::flash("Successfully added to featured providers", "success");
        return Redirect::back();
    }
    public function removeFromFeaturedProvider(\App\User $user){
        $user->info->featured = 0;
        $user->info->save();

        M::flash("Successfully removed from featured providers", "danger");
        return Redirect::back();
    }

    public function listCustomers(){
        $users = \App\User::all();

        return view('admin.pages.list.customers', compact('users'));
    }
    public function removeCustomer(\App\User $user){
        $user->delete();

        M::flash("Successfully deleted customer", "danger");

        return redirect('admin/list/customers');
    }

    public function listEvents(){
        $events = Event::all();

        return view('admin.pages.list.events', compact('events'));
    }

    public function listOrders(){
        $orders = \App\Models\ServiceOrder::all();

        return view('admin.pages.list.orders', compact('orders'));
    }

    public function eventTickets(Event $event){
        return view('admin.pages.list.eventTickets', compact('event'));
    }
    public function revokeTicket(\App\Models\Ticket $ticket){
        $ticket->revokeTicket();

        M::flash("Successfully Revoked the ticket - ".$ticket->ticket, "success");

        return Redirect::back();
    }
    public function unrevokeTicket(\App\Models\Ticket $ticket){
        $ticket->unrevokeTicket();

        M::flash("Successfully Unrvoked the ticket - ".$ticket->ticket, "success");

        return Redirect::back();
    }

    public function removeEvent(Event $event){
        $event->delete();

        M::flash("Successfully deleted event", "danger");

        return Redirect::back();
    }

    public function listProviders(){
        $UI = new \App\Models\UserInfo;
        $users = $UI->getAllProviders();

        return view('admin.pages.list.providers', compact('users'));
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
