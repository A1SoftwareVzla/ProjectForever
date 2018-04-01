<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    public function team(){
        return $this->belongsTo(Team::class);
    }
    public function fixture(){
        return $this->belongsTo(Fixture::class);
    }
    public function bets(){
        return $this->hasMany(Bet::class);
    }
}
