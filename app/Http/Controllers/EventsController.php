<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventFormRequest;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(["index", "showEvent"]);
    }
    public function index()
    {
        return view('events.event');
    }

    public function showEvent(Event $event)
    {
        return view('events.eventDetails', compact('event'));
    }

    public function showCreateEvent()
    {
        $eTypes = ['Fashion show', 'Trade Fair', 'Career Fair', 'Talent Hunt', 'Talk Show', 'Training', 'Workshop', 'Seminar',
        'Conference', 'Corporate Party', 'Tourism', 'Dinner Party', 'Pool Party', 'Carnival', 'Wedding Ceremony', 'Burial Ceremony',
        'Engagement Party', 'Proposal Party', 'Convention', 'Sport Competition', 'Award Ceremony', 'Road Trip', 'Naming Ceremony',
        'Birthday Party', 'Contest', 'Coronation', 'Ordination', 'Others'];

        return view('events.create', compact('eTypes'));
    }

    public function storeEvent(EventFormRequest $request)
    {
        Event::create($request->all());
        // dd($request->all());
    }

    public function showCreateEventPackage()
    {
        return view('events.createPackage');
    }

    public function showCreateEventMedia()
    {
        return view('events.createMedia');
    }

    public function showCreateEventAwards()
    {
        return view('events.createAwards');
    }

    public function showCreateEventSponsors()
    {
        return view('events.createSponsors');
    }
}
