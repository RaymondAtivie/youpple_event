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

    public function createServiceOrder($params)
    {
        $params['history'] = json_encode([
            0 => [
                'budget' => $params['budget'],
                'datetime' => \Carbon\Carbon::now()->format("d/m/Y H:i"),
                'made_by' => "user",
                'message' => $params['comment'],
            ]
        ]);
        // dd($params);
        $order = $this->serviceOrders()->create($params);

        return $order;
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

    public function serviceOrders()
    {
        return $this->hasMany("App\Models\ServiceOrder");
    }

    public function info()
    {
        return $this->hasOne("App\Models\UserInfo");
    }

    public function social()
    {
        return $this->hasOne("App\Models\SocialLogins");
    }
}
