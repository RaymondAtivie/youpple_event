<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventFormRequest;
use Carbon\Carbon;
use App\Models\EventType;
use Validator;
use App\Helpers\M;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(["index", "showEvent"]);
    }

    public function home()
    {
        return view('events.event');
    }

    public function show(Event $event)
    {
        return view('events.eventDetails', compact('event'));
    }

    public function showCreate()
    {
        $eTypes = EventType::lists("name", "id");

        return view('events.create', compact('eTypes'));
    }

    public function store(EventFormRequest $request)
    {
        $event = Event::create($request->all());
        $event->eventTypes()->sync($request->input("event_type"));

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
        return redirect('events/create/media');
    }

    public function showCreateMedia()
    {
        return view('events.createMedia');
    }

    public function storeMedia(Request $r)
    {
        $event = session("event");

        for($i=0;$i<count($r->input('title'));$i++) {

            if ($r->file('file')[$i]->isValid()) {
                $destinationPath = 'uploads/'.strtolower($r->input('type')[$i]); // upload path
                $extension = $r->file('file')[$i]->getClientOriginalExtension(); // getting image extension
                $fileName = $destinationPath.abs(rand(1000000,1111000000010)).'.'.$extension; // renameing image
                $r->file('file')[$i]->move($destinationPath, $fileName); // uploading file to given path
            }else{
                $fileName = null;
            }

            $p = [
                "title" => $r->input('title')[$i],
                "url" => $r->input('url')[$i],
                "file" => $fileName,
                "type" => $r->input('type')[$i]
            ];
            $event->media()->create($p);
        }

        M::flash("Media successfully added to your event");
        return redirect('events/create/awards');
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
                if ($r->file('cFile_'.$i)[$j] != null) {
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

            if ($r->file('file')[$i]->isValid()) {
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
