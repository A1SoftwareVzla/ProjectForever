<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name', 'short_name', 'symbol',
    ];
    public function tournaments(){
        return $this->belongsToMany(\App\Models\Tournament::class);
    }
    public function matches(){
        return $this->hasMany(\App\Models\Match::class);
    }
}
