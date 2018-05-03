<?php

namespace App\Http\Controllers;

use App\Tournament;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = Tournament::orderBy('name','ASC')->paginate();
        $teams = Team::orderBy('name','ASC')->get();
        return view('admin.tournament.index')->with(compact('tournaments', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // verificar si el short_name existe, si existe devolver error
        $tournament = Tournament::create($request->all());
        // images
        if($request->file('symbol')){
            $path = Storage::disk('public')->put('image', $request->file('symbol'));
            $tournament->fill(['symbol' => asset($path)])->save();
        }
        if($request->file('image')){
            $path = Storage::disk('public')->put('image', $request->file('image'));
            $tournament->fill(['image' => asset($path)])->save();
        }
        //sincronizacion de equipos del torneo
        $tournament->teams()->sync($request->get('teams'));

        return redirect()->route('tournament.index')->with('info','Torneo guardado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        $teams = Team::orderBy('name','ASC')->get();
        return view('admin.tournament.edit')->with(compact('tournament', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        $tournament = Tournament::find($tournament->id);
        $tournament->fill($request->all())->save();
        // images
        if($request->file('symbol')){
            $path = Storage::disk('public')->put('image', $request->file('symbol'));
            $tournament->fill(['symbol' => asset($path)])->save();
        }
        if($request->file('image')){
            $path = Storage::disk('public')->put('image', $request->file('image'));
            $tournament->fill(['image' => asset($path)])->save();
        }
        //sincronizacion de equipos del torneo
        $tournament->teams()->sync($request->get('teams'));

        return redirect()->route('tournament.edit', $tournament->id)->with('info','Torneo actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        Tournament::find($tournament->id)->delete();
        return redirect()->route('tournament.index')->with('info','Torneo '.$tournament->name.' fué eliminado con éxito');
    }
}
