<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    public function match(){
        return $this->belongsTo(Match::class);
    }

    //falta la relacion con la tabla group_user

}
