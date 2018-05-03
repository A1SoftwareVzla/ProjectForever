<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    protected $fillable = [
        'forecast_id', 'match_id', 'forecast',
    ];
    public function match(){
        return $this->belongsTo(Match::class);
    }
    public function forecast(){
        return $this->belongsTo(Forecast::class);
    }
    

}
