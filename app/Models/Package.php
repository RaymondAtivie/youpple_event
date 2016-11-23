<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $casts = [
        'free' => 'boolean'
    ];
    protected $fillable = [
        'title', 'description', 'fee_type', 'free',
        'early_amount', 'early_currency',
        'late_amount', 'late_currency',
        'startdate_amount', 'startdate_currency',
        // 'fee_amount', 'fee_style', 'fee_currency'
    ];

    public function getFeeCurrencyAttribute($value)
    {
        $currency = collect(['USD'=>"$", "Naira"=>"₦", 'Cedi'=>'GH¢',
        'Euro'=>'€', 'GBP'=>'£', 'CFA'=>'CFA franc',
        'SAR'=>'SAR', "Yuan"=>"Y"]);

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
