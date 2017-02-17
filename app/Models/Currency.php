<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currency';
    protected $fillable = [
        'name', 'short_name', 'rate', 'symbol'
    ];
    protected $cast = [
        'visible'=>'boolean'
    ];

    public function calcNaira($value)
    {
        return $this->rate * $value;
    }
}
