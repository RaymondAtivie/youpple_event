<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $table = "event_awards";
    protected $dates = ['voting_end_date'];

    public function votingActive()
    {
        return $this->voting_end_date->gt(\Carbon\Carbon::now());
    }

    public function event()
    {
        return $this->belongsTo("App\Models\Event");
    }

    public function contestants()
    {
        return $this->hasMany("App\Models\Contestant");
    }
}
