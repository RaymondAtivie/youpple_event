<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    public function votingPercentage()
    {
        $totalVotes = Contestant::where('award_id', $this->award_id)->lists('vote')->sum();
        // $totalVotes = 0;
        // foreach ($votes as $num) {
        //     $totalVotes += $num;
        // }

        return round(($this->vote / $totalVotes) * 100, 2);
    }
    public function award()
    {
        return $this->belongsTo("App\Models\Award");
    }
}
