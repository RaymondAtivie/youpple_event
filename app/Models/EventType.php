<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class EventType extends Model
{
    protected $casts = [
        'visible' => 'boolean',
    ];
    public function events()
    {
        $eventids = DB::table('event_event_type')->select("event_id")->where("event_type_id", $this->id)->get();
        $events = [];
        foreach ($eventids as $eventid) {
            $event = \App\Models\Event::find($eventid->event_id);
            if($event->published == "true"){
                $events[] = $event;
            }
        }

        return $events;
    }
}
