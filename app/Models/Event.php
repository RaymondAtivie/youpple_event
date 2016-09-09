<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Event extends Model
{
    protected $dates = ['datetime', 'datetime_end'];
    // protected $dateFormat = 'd m Y H:i a';

    protected $fillable = ['title', 'description', 'venue', 'datetime', 'datetime_end', 'image', 'others'];

    protected $casts = [
        'venue' => 'array',
    ];

    public function setDatetimeAttribute($value)
    {
        $this->attributes['datetime'] = Carbon\Carbon::createFromFormat('m/d/Y h:i a', $value);
    }
    public function setDatetimeEndAttribute($value)
    {
        $this->attributes['datetime_end'] = Carbon\Carbon::createFromFormat('m/d/Y h:i a', $value);
    }

    public function publish()
    {
        $this->published = "true";
        $this->save();
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

    public function tickets()
    {
        return $this->hasMany("App\Models\Ticket");
    }
}
