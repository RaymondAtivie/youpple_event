<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    protected $table = "orders_payment_history";
    protected $guarded = ['id'];

    protected $dates = ['created_at', 'updated_at'];

    // Relationships
    public function owner()
    {
        return $this->belongsTo("App\User", "user_id");
    }

    public function provider(){
        if($this->provider_id == 0){
            return "Youpple";
        }else{
            return $this->belongsTo("App\User", "provider_id");
        }
    }
}
