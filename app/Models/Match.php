<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'home_team', 'visitor_team', 'date','time','home_score','visitor_score','result','fixture_id','statHome','statVisitor','statTie',
    ];
    public function team(){
        return $this->belongsTo(\App\Models\Team::class);
    }
    public function fixture(){
        return $this->belongsTo(\App\Models\Fixture::class);
    }
    public function bets(){
        return $this->hasMany(\App\Models\Bet::class);
    }
}
