<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name', 'short_name', 'symbol',
    ];
    public function tournaments(){
        return $this->belongsToMany(Tournament::class);
    }
    public function matches(){
        return $this->hasMany(Match::class);
    }
}
