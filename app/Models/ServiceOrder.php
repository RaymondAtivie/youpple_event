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

    public function owner()
    {
        return $this->belongsTo("App\User", "user_id");
    }

}
