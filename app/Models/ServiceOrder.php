<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    protected $table = "event_order";
    protected $guarded = ['id'];

    protected $casts = [
        'event_services' => 'array',
        'history' => 'array'
    ];


    //Relationships
    public function owner()
    {
        return $this->belongsTo("App\User", "user_id");
    }

    public function provider(){
        if($this->provider_id == 0){
            return "Youpple";
        }else{
            return $this->belongsTo("App\User", "provider_id");
        }
    }

}
