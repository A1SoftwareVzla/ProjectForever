<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = [
        'name', 'description', 'symbol', 'image',
    ];
    public function forecasts(){
        return $this->hasMany(Forecast::class);
    }
    public function fixtures(){
        return $this->hasMany(Fixture::class);
    }
    public function teams(){
        return $this->belongsToMany(Team::class);
    }
}
