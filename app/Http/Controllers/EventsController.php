<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EventFormRequest;
use Carbon\Carbon;
use App\Models\EventType;
use Validator;
use App\Slim;
use Auth;
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
        $fEvents = \App\Models\Event::where("published", "true")->where("featured", "true")->limit(5)->get();
        $fProviders = \App\Models\UserInfo::where("featured", 1)->limit(5)->get();
        $providers = \App\Models\UserInfo::get();

        // dd($fProviders[0]->user);

        $services = M::getServices();

        return view('events.event', compact('events', 'fEvents', "services", "providers", "fProviders"));
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
        $eTypes = EventType::lists("name", "id");

        return view('events.create', compact('eTypes'));
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

    public function showCreatePackage()
    {
        return view('events.createPackage');
    }

    public function storePackage(Request $r)
    {
        $event = session("event");

        for($i=0;$i<count($r->input('title'));$i++) {
            $p = [
                "title" => $r->input('title')[$i],
                "description" => $r->input('description')[$i],
                // "fee_type" => $r->input('fee_type')[$i],
                "fee_currency" => $r->input('fee_currency')[$i],
                "fee_amount" => $r->input('fee_amount')[$i],
                "fee_style" => $r->input('fee_style')[$i],
            ];
            $event->packages()->create($p);
        }

        M::flash("Packages successfully added to your event");
        return redirect('events/create/awards');
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
        return view('events.createAwards');
    }

    public function storeAwards(Request $r)
    {
        $event = session("event");

        for($i=0;$i<count($r->input('title'));$i++) {
            $a = [
                "title" => $r->input('title')[$i],
                "description" => $r->input('description')[$i],
                // "fee_type" => $r->input('fee_type')[$i],
                "enable_registration" => $r->input('enable_registration')[$i],
                "enable_voting" => isset($r->input('enable_voting')[$i]) ?: $r->input('enable_voting')[$i] = 'off',
                "voting_end_date" => $r->input('voting_end_date')[$i],
            ];
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

        M::flash("Award(s) successfully added to your event");
        return redirect('events/create/sponsors');
    }

    public function showCreateSponsors()
    {
        return view('events.createSponsors');
    }

    public function storeSponsors(Request $r)
    {
        $event = session("event");

        for($i=0;$i<count($r->input('name'));$i++) {

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

        M::flash("Sponsors have been successfully added to your event");
        return redirect('events/preview');
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
