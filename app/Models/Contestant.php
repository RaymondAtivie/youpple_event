<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    public function votingPercentage()
    {
        $totalVotes = Contestant::where('award_id', $this->award_id)->lists('vote')->sum();

        return round(($this->vote / $totalVotes) * 100, 1);
    }
    public function award()
    {
        return $this->belongsTo("App\Models\Award");
    }
}
