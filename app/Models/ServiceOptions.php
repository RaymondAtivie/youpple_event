<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceOptions extends Model
{
    protected $table = "service_options";
    protected $casts = [
        'visible' => 'boolean',
    ];

    public function children()
    {
        return $this->hasMany("App\Models\ServiceList", "service_id");
    }

}
