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
        'dPicture' => 'array',
        'featured' => 'boolean'
    ];


    public function user()
    {
        return $this->belongsTo("App\User", "user_id");
    }
    
    public function getAllProviders($type = "all"){
        $pBuild = $this->where('user_type', 'provider');

        switch ($type) {
            case 'featured':
            $pBuild = $pBuild->where("featured", true);
            break;

            case 'unfeatured':
            $pBuild = $pBuild->where("featured", false);
            break;

            default:
            #do nothing
            break;
        }

        $providers = $pBuild->get();
        $users = [];
        foreach ($providers as $provider) {
            $users[] = $provider->user;
        }

        return $users;
    }
}
