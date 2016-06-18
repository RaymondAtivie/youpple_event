<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = ['datetime', 'datetime_end'];

    public function getVenueAttribute($venue)
    {
        return unserialize($venue);
    }


    //Relationships
    public function owner()
    {
        return $this->belongsTo("App\User", "user_id");
    }

    public function packages()
    {
        return $this->hasMany("App\Models\Package");
    }

    public function media()
    {
        return $this->hasMany("App\Models\Media");
    }

    public function sponsors()
    {
        return $this->hasMany("App\Models\Sponsor");
    }

    public function awards()
    {
        return $this->hasMany("App\Models\Award");
    }

    public function eventTypes()
    {
        return $this->belongsToMany("App\Models\EventType")->withTimestamps();
    }
}
