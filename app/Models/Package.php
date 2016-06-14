<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public function getFeeCurrencyAttribute($value)
    {
        $currency = collect(['dollar'=>"$", "naira"=>"₦", 'cedi'=>'GH¢', 'euro'=>'€', 'pounds'=>'£', 'safer'=>'CFA franc']);

        return $currency->get($value, '₦');
    }

    public function event()
    {
        return $this->belongsTo("App\Models\Event");
    }

    public function packageFeeTypes()
    {
        return $this->belongsToMany("App\Models\PackageFeeType")->withTimestamps();
    }
}
