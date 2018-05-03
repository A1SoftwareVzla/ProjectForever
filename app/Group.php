<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name', 'description', 'administrator_id',
    ];
    public function users(){
        return $this->hasMany(User::class);
    }
    public function forecasts(){
        return $this->belongsToMany(Forecast::class);
    }
}
