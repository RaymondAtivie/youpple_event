<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Award extends Model
{
    protected $table = "event_awards";

    protected $dates = ['voting_end_date'];

    protected $fillable = ['title', 'description', 'voting_end_date', 'enable_voting', 'enable_registration'];

    public function setVotingEndDateAttribute($value)
    {
        $this->attributes['voting_end_date'] = Carbon\Carbon::createFromFormat('m/d/Y h:i a', $value);
    }

    public function setEnableVotingAttribute($value)
    {
        if($value == "on"){
            $this->attributes['enable_voting'] = "true";
        }else{
            $this->attributes['enable_voting'] = "false";
        }
    }

    public function setEnableRegistrationAttribute($value)
    {
        if($value != "true"){
            $this->attributes['enable_registration'] = "false";
        }else{
            $this->attributes['enable_registration'] = "true";
        }
    }

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
