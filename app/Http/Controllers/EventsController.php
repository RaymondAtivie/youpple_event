<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests;

class EventsController extends Controller
{
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
        return view('events.create');
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
