<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = "ticket";
    protected $guarded = ['id'];

    protected $casts = [
        'packages' => 'array',
        'revoked' => 'boolean'
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
            $p = \App\Models\Pack::find($pid);
            $packs[] = $p;
        }

        return $packs;
    }

    public function getTotalPrice(){
        $sum = 0;
        foreach ($this->getPackages() as $pack) {
            $sum += $pack->calcNaira();
        }

        return $sum;
    }

    public function revokeTicket(){
        $this->update(['revoked'=>1]);
    }

    public function unrevokeTicket(){
        $this->update(['revoked'=>0]);
    }


}
