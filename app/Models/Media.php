<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = "event_media";

    protected $fillable = ['title', 'url', 'file', 'type'];

    public function getFileAttribute($file)
    {
        if (filter_var($file, FILTER_VALIDATE_URL)) {
            return $this->attributes['file'] = $file;
        }else{
            return $this->attributes['file'] = url($file);
        }
    }
}
