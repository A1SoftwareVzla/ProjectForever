<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = [
        'home_team', 'visitor_team', 'date','result','fixture_id','statHome','statVisitor','statTie',
    ];
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
