<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = "ticket";
    protected $guarded = ['id'];

    protected $casts = [
        'packages' => 'array'
    ];


    public function user()
    {
        return $this->belongsTo("App\User", "user_id");
    }

    public function event()
    {
        return $this->belongsTo('App\Models\Event', "event_id");
    }
    
    public function getPackages()
    {
        foreach ($this->packages as $pid) {
            $p = \App\Models\Package::find($pid);
            $packs[] = $p;
        }

        return $packs;
    }


}
