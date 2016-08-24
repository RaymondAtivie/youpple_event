<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = "users_info";
    protected $guarded = ['id'];

    protected $casts = [
        'intrests' => 'array',
        'event_services' => 'array',
        'dPicture' => 'array'
    ];


    public function user()
    {
        return $this->belongsTo("App\User", "user_id");
    }

    public function getAllProviders(){
        $providers = $this->where('user_type', 'provider')->get();
        foreach ($providers as $provider) {
            $users[] = $provider->user;
        }

        return $users;
    }
}
