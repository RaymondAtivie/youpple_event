<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EventFormRequest;
use Carbon\Carbon;
use App\Models\Package;
use App\Models\Award;
use App\Models\Sponsor;
use App\Models\EventType;
use Validator;
use App\Slim;
use Auth;
use Hash;
use App\Helpers\M;
use App\User;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(["home", "show", "listEvents", "listEventsByCategory", "viewService", "listServicesByCategory"]);
    }

    public function home()
    {
        $events = \App\Models\Event::where("published", "true")->limit(5)->get();
        $fEvents = \App\Models\Event::where("published", "true")->where("featured", "true")->get();
        $fProviders = \App\Models\UserInfo::where("featured", 1)->get();
        $providers = \App\Models\UserInfo::get();

        $services = M::getServices();
        $intrests = M::getIntrests();

        return view('events.event', compact('events', 'fEvents', "services", "intrests", "providers", "fProviders"));
    }

    public function listEvents()
    {
        $events = \App\Models\Event::where("published", "true")->get();

        $collection = collect([]);
        foreach ($events as $event) {
            $collection = $collection->merge($event->eventTypes->lists("name")->toArray());
        }

        $intrests = $collection;

        return view('events.eventCategory', compact('events', "intrests"));
    }

    public function listEventsByCategory($category)
    {
        $category = str_replace("-", " ", $category);
        $ET = \App\Models\EventType::where("name", $category)->first();

        $events = $ET->events();

        return view('events.eventList', compact('events', "category"));
    }

    public function listServicesByCategory($category)
    {
        $category = str_replace("-", " ", $category);
        $providers = \App\Models\UserInfo::where('event_services', 'like', "%".$category."%")->get();

        return view('events.eventServices', compact('providers', "category"));
    }

    public function viewService($user){
        $provider = User::find($user);
        $intrests = M::getIntrests();
        $services = M::getServices();

        if($provider->info){
            return view("events.showService", compact("provider", "intrests", "services"));
        }else{
            return view("404");
        }

    }

    //////////////////////////// MY EVENT MANAGEMENT ///////////////////////////
    public function showUserEvents(){
        $events = Auth::user()->events;

        return view('events.myevents', compact('events'));
    }

    public function showUserEventTickets(Event $event){
        return view('events.mytickets', compact('event'));
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
    ///////////////////////END OF MY EVENT MANAGEMENT///////////////////////////

    //////////////////////////// MY PROFILE MANAGEMENT ///////////////////////////
    public function becomeProvider(){
        if(!isset($user->info->user_type)){
            Auth::user()->addInfo([]);
        }

        M::flash("Successfully registered as a provider. Please fill in your details as a provider");



        return Redirect::to("events/myprofile");
    }

    public function showUserProfile(){
        $user = Auth::user();

        $intrests = M::getIntrests();
        $services = M::getServices();

        return view('events.myprofile', compact('user', 'intrests', 'services'));
    }

    public function viewProfile(){
        $user = Auth::user();

        return view('events.profile', compact('user'));
    }

    public function updateDP(){
        $images = Slim::getImages('picture');
        if(isset($images[0])){
            $image = $images[0];

            $lExt = $image['input']['ext'];
            $lName = $image['input']['name'];
            $lData = $image['output']['data'];

            $file = Slim::saveFile($lData, $lName, "jpg", false);

            $pid = rand(100000, 999999999);

            $filename = "dp/".$pid.".".$lExt;
            rename($file['path'], "userPhotos/".$filename);

            Auth::user()->picture = $filename;
            Auth::user()->save();

            if(Auth::user()->info){
                Auth::user()->info->picture = $filename;
                Auth::user()->info->save();
            }
        }

        return [
            "status"=>"success",
            "name"=>$filename,
            "path"=>url('userPhotos/'.$filename)
        ];
    }

    public function updateExtraPics(){
        $images = Slim::getImages('dPicture');
        $files = [];
        foreach ($images as $image) {
            $lExt = $image['input']['ext'];
            $lName = $image['input']['name'];
            $lData = $image['output']['data'];

            $file = Slim::saveFile($lData, $lName, "jpg", false);

            $pid = rand(100000, 999999999);

            $filename = "ex/".$pid.".".$lExt;
            rename($file['path'], "userPhotos/".$filename);

            $files[] = $filename;
        }

        Auth::user()->info->dPicture = $files;
        Auth::user()->info->save();

        M::flash("Successfully Uploaded the extra pictures", "success");

        return Redirect::back();
    }

    public function updateBio(Request $request){
        $posts = $request->all();

        if ($request->hasFile('CV')) {
            $filename = md5($request->CV->getClientOriginalName()).".".$request->CV->getClientOriginalExtension();
            $request->file('CV')->move("uploads/cv", $filename);

            $file = "uploads/cv/".$filename;
            $posts["CV"] = $file;
        }

        Auth::user()->addInfo($posts);

        M::flash("Successfully Updated bio", "success");

        return Redirect::back();
    }
    public function updateProfile(Request $request){
        $posts = $request->all();
        $u = Auth::user();

        $u->name = $posts['name'];
        $u->phone = $posts['phone'];
        $u->gender = $posts['gender'];
        $u->dob = $posts['dob'];
        $u->zipcode = $posts['zipcode'];
        $u->lga = $posts['lga'];
        $u->state = $posts['state'];
        $u->country = $posts['country'];
        $u->address = $posts['address'];

        $u->save();

        M::flash("Successfully Updated Profile", "success");

        return Redirect::back();
    }

    public function updateProfilePassword(Request $request){
        $posts = $request->all();

        if(!(count($posts) == 3 && isset($posts['cpassword']) && isset($posts['newpassword']) && isset($posts['confirm_password']))){
            M::flash("Something went wrong. Bad request", "danger");

            return Redirect::back();
        }

        if (!Hash::check($posts['cpassword'], Auth::user()->getAuthPassword())){
            M::flash("Your current password was not correct. Please try again", "danger");
            return Redirect::back();

        }elseif($posts['newpassword'] != $posts['confirm_password']){
            M::flash("Your new passwords did not match. Please try again", "warning");
            return Redirect::back();
        }else{
            Auth::user()->password = bcrypt($posts['newpassword']);
            Auth::user()->save();

            M::flash("Successfully Updated Profile", "success");

            return Redirect::back();
        }
    }

    public function switchUserType($usertype){

        // dd($usertype);
        if($usertype == "provider"){
            Auth::user()->info->user_type = "provider";
            $type = "business";
        }else{
            Auth::user()->info->user_type = "customer";
            $type = "individual";
        }
        Auth::user()->info->save();

        M::flash("Successfully switched your profile to become <b>$type</b> service provider", "success");
        return Redirect::back();
    }
    ///////////////////////END OF MY PROFILE MANAGEMENT///////////////////////////

    public function show($event)
    {
        $event = Event::find($event);
        if($event){
            return view('events.eventDetails', compact('event'));
        }else{
            return view('404');
        }
    }

    public function showCreate()
    {
        if(!Auth::user()->verify){
            M::flash("Oops! You cannot create an event till you have verified your account", "warning");
            return Redirect::back();
        }

        $eTypes = EventType::lists("name", "id");
        $countries = M::getCountries();

        return view('events.create', compact('eTypes', 'countries'));
    }

    public function store(Request $request)
    {
        $posts = $request->all();
        $posts['venue'] = explode(";", $posts['venue']);

        $images = Slim::getImages('picture');

        if(isset($images[0])){
            $image = $images[0];

            $lExt = $image['input']['ext'];
            $lName = $image['input']['name'];
            $lData = $image['output']['data'];

            $file = Slim::saveFile($lData, $lName, "jpg", false);

            $pid = rand(100000, 999999999);

            $filename = "event/".$pid.".".$lExt;
            rename($file['path'], "userPhotos/".$filename);

            $posts['image'] = $filename;
        }

        $event = Auth::user()->createEvent($posts, $request->input("event_type"));

        $files = $request->file("audioFile");
        $audio = $request->input("audio");
        $urls = $request->input("audioUrl");

        if(isset($files[0])){
            $this->storeAudio($event, $files, $audio, $urls);
        }

        session(['event'=> $event]);

        M::flash("Event created");
        return redirect('events/create/package');
    }

    public function showCreatePackage(Request $request)
    {
        $event = session("event");
        $packs = \App\Models\Event::find($event->id)->packages;

        $pnum = intval($request->get("pnum"));

        return view('events.createPackage', compact('pnum', 'packs'));
    }

    public function storePackage(Request $r)
    {
        $event = session("event");

        $packages = $r->get('pack');
        $j = 0;
        if($packages){
            foreach ($packages as $package) {
                if(trim($package['title']) != ""){
                    $j++;
                    $p = [
                        "title" => $package['title'],
                        "description" =>  $package['description'],
                        "fee_type" =>  $package['fee_type'],
                    ];
                    if(isset($package['free'])){
                        $p['free'] = true;
                    }
                    $newPackage = $event->packages()->create($p);

                    if(!isset($package['free'])){
                        if(isset($package['early_amount']) && $package['early_amount'] != ""){
                            $e = [
                                'event_id'=>$event->id,
                                'name'=>'early',
                                'amount'=>$package['early_amount'],
                                'currency'=>$package['early_currency'],
                            ];
                            $newPackage->packs()->create($e);
                            // $p['early_amount'] = $package['early_amount'];
                            // $p['early_currency'] = $package['early_currency'];
                        }
                        if(isset($package['late_amount']) && $package['late_amount'] != ""){
                            $e = [
                                'event_id'=>$event->id,
                                'name'=>'late',
                                'amount'=>$package['late_amount'],
                                'currency'=>$package['late_currency'],
                            ];
                            $newPackage->packs()->create($e);
                            // $p['late_amount'] = $package['late_amount'];
                            // $p['late_currency'] = $package['late_currency'];
                        }
                        if(isset($package['startdate_amount']) && $package['startdate_amount'] != ""){
                            $e = [
                                'event_id'=>$event->id,
                                'name'=>'startdate',
                                'amount'=>$package['startdate_amount'],
                                'currency'=>$package['startdate_currency'],
                            ];
                            $newPackage->packs()->create($e);
                            // $p['startdate_amount'] = $package['startdate_amount'];
                            // $p['startdate_currency'] = $package['startdate_currency'];
                        }
                    }else{
                        $e = [
                            'event_id'=>$event->id,
                            'name'=>'free',
                            'amount'=>0,
                            'currency'=>1,
                        ];
                        $newPackage->packs()->create($e);
                    }
                }
            }
        }
        if($j > 0){
            M::flash("Package(s) successfully added to your event");
        }else{
            M::flash("No package was added to the event");
        }
        return redirect('events/create/awards');
    }
    public function deletePackage(Package $package){
        $package->forceDelete();

        M::flash("Successfully deleted the package", "danger");

        return Redirect::back();
    }

    public function showCreateMedia()
    {
        return view('events.createMedia');
    }

    public function storeAudio($event, $fileA, $titleA, $urlA)
    {
        for($i=0;$i<count($titleA);$i++) {

            if (isset($fileA[$i]) && $fileA[$i]->isValid()) {
                $destinationPath = 'uploads/audio'; // upload path
                $extension = $fileA[$i]->getClientOriginalExtension(); // getting image extension
                $fileName = $destinationPath.abs(rand(1000000,1111000000010)).'.'.$extension; // renameing image
                $fileA[$i]->move($destinationPath, $fileName); // uploading file to given path
            }else{
                $fileName = '';
            }

            $p = [
                "title" => $titleA[$i],
                "url" => $urlA[$i],
                "file" => $fileName,
                "type" => "audio"
            ];
            $event->media()->create($p);
        }

        // M::flash("Media successfully added to your event");
        // return redirect('events/create/awards');
    }

    public function showCreateAwards()
    {
        $event = session("event");
        $awards = \App\Models\Event::find($event->id)->awards;

        return view('events.createAwards', compact("awards"));
    }

    public function storeAwards(Request $r)
    {
        $event = session("event");

        // dd($r->all());
        $j = 0;
        for($i=0;$i<count($r->input('title'));$i++) {
            if($r->input('title')[$i] != ""){
                $j++;
                $a = [
                    "title" => $r->input('title')[$i],
                    "description" => $r->input('description')[$i],
                    // "fee_type" => $r->input('fee_type')[$i],
                    "enable_registration" => $r->input('enable_registration')[$i],
                    "enable_voting" => isset($r->input('enable_voting')[$i]) ?: $r->input('enable_voting')[$i] = 'off'
                ];

                if(isset($r->input('enable_voting')[$i])){
                    $a["voting_end_date"] = $r->input('voting_end_date')[$i];
                }
                $award = $event->awards()->create($a);

                for($j=0;$j<count($r->input('cName_'.$i));$j++) {
                    // dd($r->file());
                    if (isset($r->file('cFile_'.$i)[$j]) && $r->file('cFile_'.$i)[$j]->isValid()) {
                        $destinationPath = 'uploads/contestants/'; // upload path
                        $extension = $r->file('cFile_'.$i)[$j]->getClientOriginalExtension(); // getting image extension
                        $fileName = $destinationPath.abs(rand(1000000,1111000000010)).'.'.$extension; // renameing image
                        $r->file('cFile_'.$i)[$j]->move($destinationPath, $fileName); // uploading file to given path
                    }else{
                        $fileName = "uploads/contestants/unknown.jpg";
                    }

                    $c = [
                        'name' => $r->input('cName_'.$i)[$j],
                        'description' => $r->input('cDesc_'.$i)[$j],
                        'image' => $fileName
                    ];

                    $award->contestants()->create($c);
                }
            }
        }
        if($j > 0){
            M::flash("Award(s) successfully added to your event");
        }else{
            M::flash("No award was added to the event");
        }
        return redirect('events/create/sponsors');
    }
    public function deleteAward(Award $award){
        $award->forceDelete();

        M::flash("Successfully deleted the award", "danger");

        return Redirect::back();
    }

    public function showCreateSponsors()
    {
        $event = session("event");
        $sponsors = \App\Models\Event::find($event->id)->sponsors;

        return view('events.createSponsors', compact("sponsors"));
    }

    public function storeSponsors(Request $r)
    {
        $event = session("event");

        $j = 0;
        for($i=0;$i<count($r->input('name'));$i++) {
            if($r->input('name')[$i] != ""){
                $j++;
                if (isset($r->file('file')[$i]) && $r->file('file')[$i]->isValid()) {
                    $destinationPath = 'uploads/sponsors/'; // upload path
                    $extension = $r->file('file')[$i]->getClientOriginalExtension(); // getting image extension
                    $fileName = $destinationPath.abs(rand(1000000,1111000000010)).'.'.$extension; // renameing image
                    $r->file('file')[$i]->move($destinationPath, $fileName); // uploading file to given path
                }else{
                    $fileName = "unknown.jpg";
                }

                $p = [
                    "name" => $r->input('name')[$i],
                    "link" => $r->input('link')[$i],
                    "logo" => $fileName
                ];
                $event->sponsors()->create($p);
            }
        }

        if($j > 0){
            M::flash("Sponsors have been successfully added to your event");
        }else{
            M::flash("No Sponsors were added tot he event");
        }
        return redirect('events/preview');
    }
    public function deleteSponsor(Sponsor $sponsor){
        $sponsor->forceDelete();

        M::flash("Successfully deleted this partner", "danger");

        return Redirect::back();
    }

    public function showPreview()
    {
        $ev = session("event");
        $event = Event::find($ev->id);

        // $event->load("sponsors", "media", "awards", "packages");

        return view("events.eventDetails", compact('event'));
    }

    public function publishEvent()
    {
        session("event")->publish();

        M::flash("Successfully published event", "success");
        $eventid = session("event")->id;
        session()->forget("event");

        return redirect('events/'.$eventid);
    }
}
