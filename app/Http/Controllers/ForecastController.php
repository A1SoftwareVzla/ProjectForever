<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;
use App\Fixture;
use App\Match;
use App\Forecast;
use App\Team;
use App\User;
use App\Bet;
use Illuminate\Support\Facades\Auth;

class ForecastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.forecast.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tournaments = Tournament::where('active', '=', true)->pluck('name','id'); //el campo sea true
        
        return view('user.forecast.create')->with(compact('tournaments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(count(Forecast::where('user_id', '=', Auth::user()->id)->where('tournament_id', '=', $request->tournament_id)->get())){
            return redirect()->route('forecast.index')->with('info','Ya has creado un pronóstico para este torneo.');
        }else{        
            $forecast = new Forecast;
            $forecast->user_id = Auth::user()->id; 
            $forecast->tournament_id = $request->tournament_id;                         
            $forecast->save();
            return redirect()->route('forecast.index')->with('info','Pronóstico creado con éxito');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show($id)
    public function show(Forecast $forecast)
    {
        $tournament = Tournament::where('id','=', $forecast->tournament_id)->first();
        $teams = Team::all();
        $user = User::where('id','=', Auth::user()->id)->first();
        $bets = Bet::where('forecast_id', '=', $forecast->id);
        return view('user.forecast.show')->with(compact('tournament','teams', 'forecast', 'user', 'bets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
