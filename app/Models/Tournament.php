<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    protected $fillable = [
        'name', 'description', 'symbol', 'image',
    ];
    public function forecasts(){
        return $this->hasMany(\App\Models\Forecast::class);
    }
    public function fixtures(){
        return $this->hasMany(\App\Models\Fixture::class);
    }
    public function teams(){
        return $this->belongsToMany(\App\Models\Team::class);
    }
}
