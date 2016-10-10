<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'name', 'email', 'password', 'dob', 'gender', 'image', 'phone', 'picture'
    ];

    protected $dates = [
        'dob'
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
        $params['history'] = [
            0 => [
                'budget' => $params['budget'],
                'datetime' => \Carbon\Carbon::now()->format("d/m/Y H:i"),
                'made_by' => Auth::user()->name,
                'message' => $params['comment'],
            ]
        ];
        // dd($params);
        $order = $this->serviceOrders()->create($params);

        // dd($order);

        return $order;
    }

    public function getOrdersToYoupple(){
        return $this->serviceOrders()->where("provider_id", 0)->get();
    }
    public function getOrdersToOthers(){
        return $this->serviceOrders()->where("provider_id", "!=", 0)->get();
    }
    public function getOrdersToMe(){
        return \App\Models\ServiceOrder::where("provider_id", $this->id)->get();
    }
    public function getPaidOrders(){
        return $this->serviceOrders()->where("provider_id", "!=", 0)->where("status", "paid")->get();
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
