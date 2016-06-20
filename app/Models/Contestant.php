<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    protected $fillable = ['name', 'description', 'image'];

    public function votingPercentage()
    {
        $totalVotes = Contestant::where('award_id', $this->award_id)->lists('vote')->sum();
        if($totalVotes == 0){
            return 0;
        }else{
            return round(($this->vote / $totalVotes) * 100, 1);
        }
    }

    public function award()
    {
        return $this->belongsTo("App\Models\Award");
    }
}
