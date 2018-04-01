<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    public function groups(){
        return $this->hasMany(Group::class);
    }
    public function fixtures(){
        return $this->hasMany(Fixture::class);
    }
    public function teams(){
        return $this->belongsToMany(Team::class);
    }
}
