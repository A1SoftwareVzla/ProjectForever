<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name', 'description', 'administrator_id',
    ];    
    public function users(){
        return $this->belongsToMany(User::class);
    }
}
