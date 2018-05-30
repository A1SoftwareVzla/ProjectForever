<?php

namespace App\Http\Controllers;

use App\Bet;
use App\Match;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store($match_id, $forecast_id, $forecast)
    {
        $match = Match::where('id','=',$match_id)->first();
        $dateNow = Carbon::now(0); //la hora actual UTC
        $dateMatch = Carbon::parse($match->date." ".$match->time); //la hora del partido debe ser cargada en UTC
        
        if($dateNow->diffInMinutes($dateMatch,false) < 15 ){ // 15 son los minutos de diferencia para poder apostar
            return "Ya no puede pronósticar este partido.".$dateNow->diffInMinutes($dateMatch,false);
        }else{
            $bet = Bet::updateOrCreate(
                ['match_id' => $match_id, 'forecast_id' => $forecast_id],
                ['forecast' => $forecast]
            );
            return "Pronóstico realizado con éxito.".$dateNow->diffInMinutes($dateMatch,false);    
        }        
    }    
}
