<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageFeeType extends Model
{
    public function packages()
    {
        return $this->belongsTo("\App\Models\Package")->withTimestamps();
    }
}
