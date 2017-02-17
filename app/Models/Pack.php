<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    protected $fillable = [
        'package_id', 'event_id', 'name', 'amount', 'currency'
    ];

    public function getCurrencySymbol()
    {
        $currency = collect(['USD'=>"$", "Naira"=>"₦", 'Cedi'=>'GH¢',
        'Euro'=>'€', 'GBP'=>'£', 'CFA'=>'CFA franc',
        'SAR'=>'SAR', "Yuan"=>"Y"]);

        return $currency->get($this->currency, '₦');
    }

    public function event()
    {
        return $this->belongsTo("App\Models\Event", "event_id");
    }

    public function package()
    {
        return $this->belongsTo("App\Models\Package", "package_id");
    }

    public function currencyObj()
    {
        return \App\Models\Currency::find($this->currency);
    }

    public function calcNaira()
    {
        $c = \App\Models\Currency::find($this->currency);
        return $c->calcNaira($this->amount);
    }
}
