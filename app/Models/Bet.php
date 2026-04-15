<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    protected $fillable = [
        'forecast_id', 'match_id', 'forecast',
    ];
    public function match(){
        return $this->belongsTo(\App\Models\Match::class);
    }
    public function forecast(){
        return $this->belongsTo(\App\Models\Forecast::class);
    }
    

}
