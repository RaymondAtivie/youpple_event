<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = "user_info";
    protected $guarded = ['id'];

    protected $casts = [
        'intrests' => 'array',
        'event_services' => 'array',
    ];


    public function user()
    {
        return $this->belongsTo("App\User", "user_id");
    }
}
