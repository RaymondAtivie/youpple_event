<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $table = "event_sponsors";

    protected $fillable = ["name", "link", "logo"];

    public function getLogoAttribute($file)
    {
        return $this->attributes['logo'] = url($file);
    }
}
