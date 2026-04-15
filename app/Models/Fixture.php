<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    protected $fillable = [
        'name', 'description', 'tournament_id',
    ];
    public function tournament(){
        return $this->belongsTo(\App\Models\Tournament::class);
    }
    public function matches(){
        return $this->hasMany(\App\Models\Match::class);
    }

}
