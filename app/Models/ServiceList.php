<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceList extends Model
{
    protected $table = "service_list";
    protected $fillable = ['name'];

    protected $casts = [
        'visible' => 'boolean',
    ];

    public function parent()
    {
        return $this->belongsTo("App\Models\ServiceOptions", "service_id");
    }
}
