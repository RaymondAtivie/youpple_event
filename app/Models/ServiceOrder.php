<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentHistory;

class ServiceOrder extends Model
{
    protected $table = "event_order";
    protected $guarded = ['id'];

    protected $casts = [
        'event_services' => 'array',
        'history' => 'array'
    ];


    public function addToHistory(){
        $params = [
            "order_id" => $this->id,
            "user_id" => $this->user_id,
            "provider_id" => $this->provider_id,
            "amount" => $this->budget
        ];

        $ph = PaymentHistory::create($params);

        return $ph;
    }

    public function checkHistoryStatus(){
        $builder = PaymentHistory::select("status")->where("order_id", $this->id);
        if($builder->count() > 0){
            $status = $builder->first()['status'];
            return $status;
        }

    }

    //Relationships
    public function owner()
    {
        return $this->belongsTo("App\User", "user_id");
    }

    public function paymentDetails()
    {
        return $this->hasOne("App\Models\PaymentHistory", "order_id");
    }

    public function provider(){
        if($this->provider_id == 0){
            return "Youpple";
        }else{
            return $this->belongsTo("App\User", "provider_id");
        }
    }

}
