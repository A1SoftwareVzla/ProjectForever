<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fixture extends Model
{
    protected $fillable = [
        'name', 'description', 'tournament_id',
    ];
    public function tournament(){
        return $this->belongsTo(Tournament::class);
    }
    public function matches(){
        return $this->toMany(Match::class);
    }

}
