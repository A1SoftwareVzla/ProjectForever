<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    protected $fillable = [
        'user_id', 'score', 'tournament_id',
    ];
    public function tournament(){
        return $this->belongsTo(Tournament::class);
    }
    public function bets(){
        return $this->hasMany(Bet::class);
    }
    public function groups(){
        return $this->belongsToMany(Group::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
