<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function tournament(){
        return $this->belongsTo(Tournament::class);
    }
}
