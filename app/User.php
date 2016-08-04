<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function createEvent($params, $eventTypes)
    {
        $event = $this->events()->create($params);
        $event->eventTypes()->sync($eventTypes);

        return $event;
    }

    public function addInfo($params)
    {
        $this->info()->updateOrCreate(['user_id'=>$this->id], $params);

        return $params;
    }

    //Relationships
    public function events()
    {
        return $this->hasMany("App\Models\Event");
    }

    public function info()
    {
        return $this->hasOne("App\Models\UserInfo");
    }
}
